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
    /**
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateLanguage($lang)
    {
        Auth::user()->update([
            'lang' => $lang,
        ]);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        // Danh sach
        $this->authorize('viewAny', User::class);

        $users = User::latest()->isAdmin()->get();
        $roles = Role::latest()->get();

        return view('user.index', compact('users', 'roles'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
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

    /**
     * @param StoreUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreUserRequest $request, User $user)
    {
        // Tạo tài khoản user
        $this->authorize('create', $user); // Phân quyền

        $avatarUrl = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);

        // Hash -> hàm một chiều (hàm băm)
        // 123 -> kasefger...
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarUrl,
            'password' => Hash::make($request->password),
            'is_admin' => (bool) $request->role,
        ]);

        $user->syncRoles($request->role); // Gán role cho user

        return redirect()->route('users.index')
            ->with('success', __('messages.successfully')); // Trang danh
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function editProfile()
    {
        return view('customer.my_account');
    }
}
