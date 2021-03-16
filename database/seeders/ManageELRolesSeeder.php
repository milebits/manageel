<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Milebits\Authorizer\Models\Role;

class ManageELRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createResellerRole();
    }

    public function createResellerRole()
    {
        Role::create(['name' => 'Reseller', 'slug' => 'reseller', 'enabled' => 'true',]);
    }
}
