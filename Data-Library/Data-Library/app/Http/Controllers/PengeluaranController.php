<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    public function index()
    {
        $expense = pengeluaran::orderBy('tgl_pengeluaran', 'desc')->get();

        return view('admin.pengeluaran.index', ['expense' => $expense]);
    }

    public function show($id)
    {
        $expense = pengeluaran::find($id);

        if (!$expense) {
            return redirect()->route('pengeluaran.index')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.pengeluaran.show', ['expense' => $expense]);
    }

    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tgl_pengeluaran' => 'required|date',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('pengeluarans', 'public');
        $originalFilename = $file->getClientOriginalName();

        $pengeluaran = new pengeluaran();
        $pengeluaran->file = $filePath;
        $pengeluaran->nama_file = $originalFilename;
        $pengeluaran->kategori = $request->input('kategori');
        $pengeluaran->deskripsi = $request->input('deskripsi');
        $pengeluaran->tgl_pengeluaran = $request->input('tgl_pengeluaran');
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index');
    }

    public function download($id)
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        $filePath = 'public/' . $pengeluaran->file;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $pengeluaran->nama_file);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function destroy($id)
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        $filePath = 'public/' . $pengeluaran->file;

        // Hapus file dari storage
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        // Hapus data dari database
        $pengeluaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // public function store(Request $request)
    // {
    //     DB::table('pengeluarans')->insert([
    //         'jumlah' => $request->jumlah,
    //         'kategori' => $request->kategori,
    //         'deskripsi' => $request->deskripsi,
    //         'tgl_pengeluaran' => $request->tgl_pengeluaran,
    //     ]);
    //     return redirect()->route('pengeluaran.index');
    // }
}
