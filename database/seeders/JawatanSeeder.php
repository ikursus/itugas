<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jawatan')->insert([
            'name' => 'Pengarah',
            'is_enabled' => true
        ]);

        DB::table('jawatan')->insert([
            'name' => 'Pegawai Teknologi Maklumat',
            'is_enabled' => true
        ]);

        DB::table('jawatan')->insert([
            'name' => 'Penolong Pegawai Teknologi Maklumat',
            'is_enabled' => true
        ]);
    }
}
