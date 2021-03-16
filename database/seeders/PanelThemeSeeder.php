<?php

namespace Database\Seeders;

use App\Models\PanelTheme;
use Illuminate\Database\Seeder;

class PanelThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PanelTheme::create([
            'name' => 'Default panel theme',
            'slug' => 'default',
            'enabled' => true,
        ]);
    }
}
