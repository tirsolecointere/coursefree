<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            LevelSeeder::class,
            CategorySeeder::class,
            PriceSeeder::class,
            PlatformSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
