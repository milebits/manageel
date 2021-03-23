<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Milebits\Authorizer\Models\Permission;
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
        $this->createSuperAdminRole();
        $this->createAdminRole();
        $this->createManagerRole();
        $this->createResellerRole();
    }


    public function createResellerRole()
    {
        $role = Role::create(['name' => 'Reseller', 'slug' => 'reseller', 'enabled' => false]);
        $role->permissions()->sync([
            ...Permission::getByClassAction(action: 'view'),
            ...Permission::getByClassAction(action: 'create'),
            ...Permission::getByClassAction(action: 'update'),
            ...Permission::getByClassAction(action: 'delete'),
        ]);
    }

    public function createAdminRole()
    {
        $role = Role::create(['name' => 'Administrator', 'slug' => 'admin', 'enabled' => true]);
        $role->permissions()->sync([
            ...Permission::getByClassAction(action: 'viewAny'),
            ...Permission::getByClassAction(action: 'view'),
            ...Permission::getByClassAction(action: 'create'),
            ...Permission::getByClassAction(action: 'update'),
            ...Permission::getByClassAction(action: 'delete'),
        ]);
    }

    public function createSuperAdminRole()
    {
        $role = Role::create(['name' => 'Super administrator', 'slug' => 'superAdmin', 'enabled' => true]);
        $role->permissions()->sync(Permission::getByClassAction());
    }

    public function createManagerRole()
    {
        $role = Role::create(['name' => 'Manager', 'slug' => 'manager', 'enabled' => false]);
        $role->permissions()->sync([
            ...Permission::getByClassAction(action: 'view'),
            ...Permission::getByClassAction(action: 'create'),
            ...Permission::getByClassAction(action: 'update'),
        ]);
    }
}
