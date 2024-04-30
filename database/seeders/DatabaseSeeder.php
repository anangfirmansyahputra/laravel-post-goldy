<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test Goldy User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin'
        ]);

        DB::table('branches')->insert([
            'name' => "Cabang 1",
            "address" => "Jalan cabang 1"
        ]);

        DB::table('branches')->insert([
            'name' => "Cabang 2",
            "address" => "Jalan cabang 2"
        ]);

        $this->call([
            CategorySeeder::class,
            // ProductSeeder::class,
        ]);
    }
}
