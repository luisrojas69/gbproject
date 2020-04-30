<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Permission list
        Permission::create(['name' => 'vehicles.index']);
        Permission::create(['name' => 'vehicles.edit']);
        Permission::create(['name' => 'vehicles.show']);
        Permission::create(['name' => 'vehicles.create']);
        Permission::create(['name' => 'vehicles.destroy']);

        //Permission list
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.destroy']);


        //Admin
        $admin = Role::create(['name' => 'Admin']);

        //$admin->givePermissionTo('vehicles.index');
        //$admin->givePermissionTo(Permission::all());
       
        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'vehicles.index',
            'vehicles.show',

            'users.index',
            'users.show'
        ]);

        //User Admin
        $user = User::find(1); //Luis Rojas
        $user->assignRole('Admin');
    }
}
