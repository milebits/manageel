<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Milebits\Authoriser\Database\seeders\PermissionSeeder;
use Milebits\Authoriser\Database\seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ManageELRolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PackageFeatureSeeder::class);
        $this->call(PanelThemeSeeder::class);
        $this->call(PackageSeeder::class);
    }
}
