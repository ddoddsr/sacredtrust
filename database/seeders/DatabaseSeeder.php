<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::factory()->create([
            // 'first_name' => 'Dan',
            // 'last_name' => 'Doddzy',
            'name' => 'Dan Doddzy',
            'email' => 'dd@dd.io',
            'password' => bcrypt('asdf'),
            // 'active' => true,
            // 'is_admin' => true,
        ]);
    }
}
