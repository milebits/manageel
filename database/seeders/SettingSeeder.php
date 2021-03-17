<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSetting('Application Name', 'app.name', 'ManageEL Hosting Manager');
        $this->createSetting('Application Local', 'app.local', 'en_US');
    }

    /**
     * @param string $name
     * @param string $slug
     * @param string $content
     * @return Setting
     */
    public function createSetting(string $name, string $slug, string $content): Setting
    {
        return Setting::create([
            compact('name'),
            compact('slug'),
            compact('content'),
        ]);
    }
}
