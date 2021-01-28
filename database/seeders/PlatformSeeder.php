<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create([
            'name' => 'Youtube'
        ]);
        Platform::create([
            'name' => 'Vimeo'
        ]);
    }
}
