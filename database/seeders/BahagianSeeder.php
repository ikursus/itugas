<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BahagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('bahagian')->insert([
            'name' => 'Bahagian Teknologi Maklumat',
            'is_enabled' => true
        ]);

        DB::table('bahagian')->insert([
            'name' => 'Bahagian Kewangan',
            'is_enabled' => true
        ]);
    }
}
