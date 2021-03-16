<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Milebits\Authoriser\Database\seeders\PermissionSeeder;
use Milebits\Authoriser\Database\seeders\RoleSeeder;
use Milebits\Authorizer\Models\Role;

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
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->seedAdmins();
        $this->seedModerators();
    }

    public function seedAdmins()
    {
        $admin = User::create([
            'name' => 'Centos Root',
            'username' => 'root',
            'phone' => '+33 6 11 29 92 21',
            'password' => Hash::make('password'),
            'email' => 'webmaster@manageel.test',
            'email_verified_at' => now(),
            'remember_token' => Str::random(),
        ]);
        $admin->addRole([Role::slug('admin')->first()?->id]);
    }

    public function seedModerators()
    {
        $admin = User::create([
            'name' => 'Centos Moderator',
            'username' => 'moderator',
            'phone' => '+33 3 72 91 21 62',
            'password' => Hash::make('password'),
            'email' => 'moderator@manageel.test',
            'email_verified_at' => now(),
            'remember_token' => Str::random(),
        ]);
        $admin->addRole([Role::slug('admin')->first()?->id]);
    }
}
