<?php

namespace App\Policies;

use App\Enums\PermissionName;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Check quyen cho ham index (danh sach)
        return $user->can(PermissionName::MANAGE_BOOKINGS);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Booking $booking): bool
    {
        // Check quyen cho ham show chi tiet
        return $user->can(PermissionName::MANAGE_BOOKINGS);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Check quyen cho ham create/store
        return $user->can(PermissionName::MANAGE_BOOKINGS);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Booking $booking): bool
    {
        return $user->can(PermissionName::MANAGE_BOOKINGS);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Booking $booking): bool
    {
        return $user->can(PermissionName::MANAGE_BOOKINGS);
    }
}
