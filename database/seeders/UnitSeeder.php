<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            'bahagian_id' => 1,
            'name' => 'Unit 1',
            'is_enabled' => true
        ]);


        DB::table('units')->insert([
            'bahagian_id' => 2,
            'name' => 'Unit 1a',
            'is_enabled' => true
        ]);

        DB::table('units')->insert([
            'bahagian_id' => 1,
            'name' => 'Unit 2',
            'is_enabled' => true
        ]);

        DB::table('units')->insert([
            'bahagian_id' => 2,
            'name' => 'Unit 2a',
            'is_enabled' => true
        ]);
    }
}
