<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function updateLanguage($lang)
    {
        Auth::user()->update([
            'lang' => $lang,
        ]);

        return redirect()->back();
    }

    public function index()
    {
      $this->authorize('viewAny', User::class);

        $users = User::latest()->get();
        $roles = Role::latest()->get();

        return view('user.index', compact('users', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $this->authorize('update', $user);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')
            ->with('success', __('messages.successfully'));
    }

    public function store(StoreUserRequest $request, User $user)
    {
        $this->authorize('create', $user);

        $avatarUrl = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarUrl,
            'password' => Hash::make($request->password),
            'is_admin' => (bool) $request->role,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')
            ->with('success', __('messages.successfully'));
    }
}
