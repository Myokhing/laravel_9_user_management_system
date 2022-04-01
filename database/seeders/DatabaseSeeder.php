<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ChaptersSeederTable::class,
            LessonsTableSeeder::class,

            /* 
            1 - php artisan make:seeder PermissionsTableSeeder 
            2 - php artisan make:seeder RolesTableSeeder
            3 - php artisan make:seeder PermissionRoleTableSeeder

            4 - php artisan make:seeder UsersTableSeeder

            5 - php artisan make:seeder RoleUserTableSeeder 


            */
        ]);
    }
}
