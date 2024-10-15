<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerkaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perkaras')->insert([
            'name' => 'Semua kakitangan telah meninggalkan pejabat.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Pintu-pintu bilik pegawai dikunci.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Lampu-lampu bilik pegawai telah dipadamkan.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Pintu-pintu rintangan api (kecemasan) bertutup rapat.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Tingkap telah ditutup (jika berkaitan).',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Suis komputer di workstation telah dimatikan.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Peralatan elektrik telah dimatikan.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Peralatan elektrik di pantry telah dimatikan dan paip air ditutup (kecuali peti sejuk dan mesin penapis air).',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Fail terperingkat tidak berada di atas meja atau workstation.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Paip air di dalam tandas ditutup.',
            'is_enabled' => true
        ]);

        DB::table('perkaras')->insert([
            'name' => 'Lampu-lampu pejaabt telah dipadamkan sebelum meninggalkan pejabat.',
            'is_enabled' => true
        ]);
    }
}
