<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            Permission::create(['name' => 'create products']);
            Permission::create(['name' => 'create size']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'delete banners']);
        Permission::create(['name' => 'create banners']);
        Permission::create(['name' => 'edit banners']);
        Permission::create(['name' => 'create codes']);
        Permission::create(['name' => 'edit codes']);
        Permission::create(['name' => 'delete codes']);
        
        

            $admin = Role::create(['name' => 'admin']);

            

            $admin->givePermissionTo(['create products','edit products', 'delete products','create categories','edit categories', 'delete categories', 'create codes', 'edit codes','delete codes','create size','create banners', 'delete banners', 'edit banners']);
       
    }
}
