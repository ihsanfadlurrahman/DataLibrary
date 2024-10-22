<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'name' => 'Radit Handika',
            'email' => 'radit@ptre.co.id',
            'departement' => 'Piping',
        ]);
        Karyawan::create([
            'name' => 'Kurniawan',
            'email' => 'kurni@ptre.co.id',
            'departement' => 'Instrumen',
        ]);
    }
}
