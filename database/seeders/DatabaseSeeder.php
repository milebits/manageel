<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Milebits\Authorizer\Database\seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(ManageELRolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PackageFeatureSeeder::class);
        $this->call(PanelThemeSeeder::class);
        $this->call(PackageSeeder::class);
    }
}
