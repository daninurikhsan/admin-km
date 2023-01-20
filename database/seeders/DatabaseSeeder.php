<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Priandani Nur Ikhsan',
            'role' => 'dev',
            'email' => '10201063@student.itk.ac.id',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Haidar Dzaky Sumpena',
            'role' => 'dev',
            'email' => '10201043@student.itk.ac.id',
            'password' => bcrypt('password')
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
