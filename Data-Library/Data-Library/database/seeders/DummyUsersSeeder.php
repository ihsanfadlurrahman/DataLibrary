<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Faidan',
                'email' => 'faidan@ptre.co.id',
                'password' => bcrypt('password'),
                'departement' => 'Admin',
            ],
            [
                'name' => 'Reza Hartono',
                'email' => 'reza@ptre.co.id',
                'password' => bcrypt('password'),
                'departement' => 'Project Control',
            ],
            [
                'name' => 'Kurniawan',
                'email' => 'kurni@ptre.co.id',
                'password' => bcrypt('password'),
                'departement' => 'Piping',
            ],
        ];
            
        foreach($userData as $key => $val ) {
            \App\Models\User::create($val);
        }
    }
}
