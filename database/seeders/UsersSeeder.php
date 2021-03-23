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
            'password' => Hash::make('BfHg%h$$g8TDDa=R3+'),
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
            'password' => Hash::make('_Grx9*H^!fHnF=pq!#'),
            'email' => 'moderator@manageel.test',
            'email_verified_at' => now(),
            'remember_token' => Str::random(),
        ]);
        $admin->addRole([Role::slug('admin')->first()?->id]);
    }
}
