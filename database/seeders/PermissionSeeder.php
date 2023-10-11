<?php

namespace Database\Seeders;

use App\Enums\PermissionName;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate(); // Xoa du liẹu
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Tạo các quyền
        Permission::create([
            'name' => PermissionName::MANAGE_ROOM_TYPES,
            'display_name' => 'Quản lý loại phòng',
        ]);
        Permission::create([
            'name' => PermissionName::MANAGE_ROOMS,
            'display_name' => 'Quản lý phòng',
        ]);
        Permission::create([
            'name' => PermissionName::MANAGE_BOOKINGS,
            'display_name' => 'Quản lý đặt phòng',
        ]);
        Permission::create([
            'name' => PermissionName::MANAGE_CUSTOMERS,
            'display_name' => 'Quản lý khách hàng',
        ]);
        Permission::create([
            'name' => PermissionName::MANAGE_USERS,
            'display_name' => 'Quản lý tài khoản người dùng',
        ]);
        Permission::create([
            'name' => PermissionName::MANAGE_PERMISSIONS,
            'display_name' => 'Quản lý phân quyền hệ thống',
        ]);

        // Tạo các role
        $role = Role::create(['name' => 'Quản trị viên hệ thống']);
        Role::create(['name' => 'Chủ khách sạn']);
        Role::create(['name' => 'Quản lý khách sạn']);
        Role::create(['name' => 'Lễ tân']);
        Role::create(['name' => 'Trường phòng chăm sóc khách hàng']);

        $role->syncPermissions([
            PermissionName::MANAGE_ROOM_TYPES,
            PermissionName::MANAGE_ROOMS,
            PermissionName::MANAGE_BOOKINGS,
            PermissionName::MANAGE_CUSTOMERS,
            PermissionName::MANAGE_USERS,
            PermissionName::MANAGE_PERMISSIONS,
        ]);

        User::find(1)->assignRole('Quản trị viên hệ thống');
    }
}
