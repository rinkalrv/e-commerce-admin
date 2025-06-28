<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create admin role
        $adminRole = Role::create(['name' => 'admin']);
        
        // Create permissions
        $permissions = [
            'view products', 'create products', 'edit products', 'delete products',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view orders', 'edit orders',
            'view cms', 'create cms', 'edit cms', 'delete cms',
            'view banners', 'create banners', 'edit banners', 'delete banners',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        // Assign all permissions to admin role
        $adminRole->syncPermissions($permissions);
        
        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@hermes.com',
            'password' => Hash::make('password'),
        ]);
        
        // Assign admin role
        $admin->assignRole('admin');

        // Create some regular users
        User::factory(10)->create();
    }
}