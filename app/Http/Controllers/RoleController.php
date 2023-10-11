<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
//        $this->authorize('viewAny', Role::class);

        $permissions = Permission::all();
        $roles = Role::latest()->with('permissions')->get();

        foreach ($roles as $role) {
            $role->permissionNames = $role->getPermissionNames();
        }

        return view('role.index', compact('roles', 'permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
//        $this->authorize('create', Role::class);

        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name,
            ]);
            $role->givePermissionTo($request->permissions);

            DB::commit();

            return redirect()->route('roles.index')
                ->with('success', __('messages.successfully'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function show($id)
    {
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
//        $this->authorize('update', $role);

        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
            ]);
            $role->syncPermissions($request->permissions);

            DB::commit();

            return redirect()->route('roles.index')
                ->with('success', __('messages.successfully'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function destroy(Role $role)
    {
//        $this->authorize('update', $role);

        try {
            DB::beginTransaction();

            $role->permissions()->detach();
            $role->users()->detach();
            $role->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
