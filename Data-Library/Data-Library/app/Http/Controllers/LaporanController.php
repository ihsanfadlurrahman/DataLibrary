<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function generate()
    {
        $laporan = Pemasukan::select('nama_file', 'sumber', 'deskripsi', 'tgl_pemasukan')->get();
        $pdf = PDF::loadView('admin.laporan.cetakpemasukan', compact('laporan'));

        return $pdf->download('laporan-pemasukan.pdf');
    }

    function index()
    {
        $laporan = Pengeluaran::select('nama_file', 'kategori', 'deskripsi', 'tgl_pengeluaran')->get();
        $pdf = PDF::loadView('admin.laporan.cetakpengeluaran', compact('laporan'));

        return $pdf->download('laporan-pengeluaran.pdf');
    }
}
