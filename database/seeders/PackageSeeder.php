<?php

namespace Database\Seeders;

use App\ManageEL;
use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Default package',
            'slug' => 'default',
            'enabled' => true,
        ]);
    }
}
