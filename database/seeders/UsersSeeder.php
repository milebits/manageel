<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Milebits\Authorizer\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
