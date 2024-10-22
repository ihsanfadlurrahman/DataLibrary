<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengeluaran';
    protected $table = 'pengeluarans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'file',
        'nama_file',
        'kategori',
        'deskripsi',
        'tgl_pengeluaran',
    ];

    // Tipe data untuk kolom tertentu
    protected $casts = [
        'tgl_pengeluaran' => 'date',
    ];
}
