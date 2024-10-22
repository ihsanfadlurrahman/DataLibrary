<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;


        protected $primaryKey = 'id_karyawan';
        // Nama tabel
        protected $table = 'karyawans';

        // Kolom yang dapat diisi secara massal
        protected $fillable = [
            'nama',
            'email',
            'departement',
        ];
}