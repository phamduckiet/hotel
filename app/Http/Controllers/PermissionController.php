<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Permission::class);
        $permissions = Permission::with('roles')->get();
        $roles = Role::latest()->get();

        foreach ($permissions as $permission) {
            $permission->roleNames = $permission->getRoleNames();
        }

        return view('permission.index', compact('permissions', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);
        $permission->syncRoles($request->roles);

        return redirect()->route('permissions.index')
            ->with('success', __('messages.successfully'));
    }
}
