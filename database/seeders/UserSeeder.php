<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                    'name' => 'Tirso Lecointere',
                    'email' => 'user@example.com',
                    'password' => bcrypt('secret')
                ]);

        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
