<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // give permissions
         Permission::create(['name' => 'get profile']);
         Permission::create(['name' => 'get other profile']);
         Permission::create(['name' => 'get all profile']);

         // or may be done by chaining
         $role = Role::create(['name' => 'kahmi'])
             ->givePermissionTo(['get profile', 'get other profile', 'get all profile']);

         $role = Role::create(['name' => 'kader'])
             ->givePermissionTo(['get profile', 'get other profile', 'get all profile']);

         $parent = User::create([
            'name' => 'Heri Hermawan',
            'password' => app('hash')->make('heri1995'),
            'email' => 'herhermawan007@gmail.com'
        ]);

        $parent->assignRole('kader');

        $child = User::create([
           'name' => 'Bocah Cilik',
           'password' => app('hash')->make('heri1995'),
           'email' => 'mawanher07@gmail.com'
       ]);

       $child->assignRole('kahmi');
     }
}
