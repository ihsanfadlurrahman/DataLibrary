<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pemasukan';
    protected $table = 'pemasukans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'file',
        'nama_file',
        'sumber',
        'deskripsi',
        'tgl_pemasukan',
    ];

    // Tipe data untuk kolom tertentu
    protected $casts = [
        'tgl_pemasukan' => 'date',
    ];
}
