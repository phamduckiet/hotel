<?php

namespace App\Policies;

use App\Enums\PermissionName;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can(PermissionName::MANAGE_PERMISSIONS);
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can(PermissionName::MANAGE_PERMISSIONS);
    }
}
