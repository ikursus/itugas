<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sediakan sample user data menggunakan query builder
        // Data User 1
        DB::table('users')->insert([
            'name' => 'Admin 001',
            'email' => 'admin001@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'no_phone' => '0123456789',
            'no_staff' => '1234',
            'no_ic' => '930101-05-5588',
            'level' => '1'
        ]);

        // Data User 2
        DB::table('users')->insert([
            'name' => 'Staff 001',
            'email' => 'staff001@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'no_phone' => '0123456789',
            'no_staff' => '1235',
            'no_ic' => '041225-05-3214',
            'level' => '1'
        ]);

        // Data User 3
        DB::table('users')->insert([
            'name' => 'Staff 002',
            'email' => 'staff002@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'no_phone' => '0123456789',
            'no_staff' => '1236',
            'no_ic' => '990606-05-8521',
            'level' => '1'
        ]);
    }
}
