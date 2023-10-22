<?php

namespace App\Policies;

use App\Enums\PermissionName;
use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    /**
     * Determine whether the user can view any models.
     * index
     */
    public function viewAny(User $user): bool
    {
        // Check xem user co the co quyen 'manage rooms' hay ko
        return $user->can(PermissionName::MANAGE_ROOMS);
    }

    /**
     * Determine whether the user can view the model.
     * show
     */
    public function view(User $user, Room $room): bool
    {
        return $user->can(PermissionName::MANAGE_ROOMS);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionName::MANAGE_ROOMS);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Room $room): bool
    {
        return $user->can(PermissionName::MANAGE_ROOMS);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Room $room): bool
    {
        return $user->can(PermissionName::MANAGE_ROOMS);
    }
}
