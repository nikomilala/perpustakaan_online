<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view books']);
        Permission::create(['name' => 'create books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'delete books']);
        Permission::create(['name' => 'view authors']);
        Permission::create(['name' => 'create authors']);
        Permission::create(['name' => 'edit authors']);
        Permission::create(['name' => 'delete authors']);
        Permission::create(['name' => 'view publishers']);
        Permission::create(['name' => 'create publishers']);
        Permission::create(['name' => 'edit publishers']);
        Permission::create(['name' => 'delete publishers']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'edit orders']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'create orders offline']);

        //create roles and assign existing permissions
        $catalogerRole = Role::create(['name' => 'cataloger']);
        $catalogerRole->givePermissionTo('view books');
        $catalogerRole->givePermissionTo('create books');
        $catalogerRole->givePermissionTo('edit books');
        $catalogerRole->givePermissionTo('delete books');
        $catalogerRole->givePermissionTo('view authors');
        $catalogerRole->givePermissionTo('create authors');
        $catalogerRole->givePermissionTo('edit authors');
        $catalogerRole->givePermissionTo('delete authors');
        $catalogerRole->givePermissionTo('view publishers');
        $catalogerRole->givePermissionTo('create publishers');
        $catalogerRole->givePermissionTo('edit publishers');
        $catalogerRole->givePermissionTo('delete publishers');
        $catalogerRole->givePermissionTo('view orders');
        $catalogerRole->givePermissionTo('create orders');
        $catalogerRole->givePermissionTo('edit orders');
        $catalogerRole->givePermissionTo('delete orders');


        $librarianRole = Role::create(['name' => 'librarian']);
        $librarianRole->givePermissionTo('view books');
        $librarianRole->givePermissionTo('view authors');
        $librarianRole->givePermissionTo('view publishers');
        $librarianRole->givePermissionTo('view orders');
        $librarianRole->givePermissionTo('create orders');
        $librarianRole->givePermissionTo('create orders offline');
        $librarianRole->givePermissionTo('edit orders');
        $librarianRole->givePermissionTo('delete orders');



        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'User cataloger',
            'email' => 'cataloger@niko.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($catalogerRole);

        $user = User::factory()->create([
            'name' => 'User librarian',
            'email' => 'librarian@niko.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($librarianRole);

        $user = User::factory()->create([
            'name' => 'User superadmin',
            'email' => 'superadmin@niko.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superadminRole);

        $anggotaRole = Role::create(['name' => 'anggota']);
        $anggotaRole->givePermissionTo('view books');
        $anggotaRole->givePermissionTo('view authors');
        $anggotaRole->givePermissionTo('view publishers');
        $anggotaRole->givePermissionTo('view orders');
        $anggotaRole->givePermissionTo('create orders');
        $anggotaRole->givePermissionTo('edit orders');
        $anggotaRole->givePermissionTo('delete orders');


        $user = User::factory()->create([
            'name' => 'User anggota',
            'email' => 'anggota@niko.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($anggotaRole);

    }
}
