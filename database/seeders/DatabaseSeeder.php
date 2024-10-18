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
        $this->call([
            RoleSeeder::class, // Wujudkan role dulu untuk ditambah pada user
            BahagianSeeder::class, // Wujudkan bahagian untuk ditambah pada user
            UnitSeeder::class, // Wujudkan unit untuk ditambah pada user
            JawatanSeeder::class, // Wujudkan jawatan untuk ditambah pada user
            UserSeeder::class,
            PerkaraSeeder::class
        ]);
    }
}
