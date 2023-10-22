<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use App\Policies\BookingPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\RoomPolicy;
use App\Policies\RoomTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Booking::class => BookingPolicy::class,
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        Room::class => RoomPolicy::class,
        RoomType::class => RoomTypePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
