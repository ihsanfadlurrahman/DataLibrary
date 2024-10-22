<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\User;
use App\Notifications\DocumentViewedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PemasukanController extends Controller
{
    public function index()
    {
        $income = Pemasukan::orderBy('tgl_pemasukan', 'desc')->get();

        return view('admin.pemasukan.index', ['income' => $income]);
    }

    public function show($id_pemasukan)
    {
        $income = Pemasukan::findOrFail($id_pemasukan);

        if (!$income) {
            return redirect()->route('pemasukan.index')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.pemasukan.show', ['income' => $income]);
    }

    public function create()
    {
        return view('admin.pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'sumber' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tgl_pemasukan' => 'required|date',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('pemasukans', 'public');
        $originalFilename = $file->getClientOriginalName();

        $pemasukan = new Pemasukan();
        $pemasukan->file = $filePath;
        $pemasukan->nama_file = $originalFilename;
        $pemasukan->sumber = $request->input('sumber');
        $pemasukan->deskripsi = $request->input('deskripsi');
        $pemasukan->tgl_pemasukan = $request->input('tgl_pemasukan');
        $pemasukan->save();

        return redirect()->route('pemasukan.index');
    }

    public function download($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $filePath = 'public/' . $pemasukan->file;

        if (Storage::exists($filePath)) {
            // Kirim notifikasi ke admin
            // $admin = User::where('role', 'admin')->get();
            // Notification::send($admin, new DocumentViewedNotification(Auth::user()->name, $pemasukan->nama_file));

            return Storage::download($filePath, $pemasukan->nama_file);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $filePath = 'public/' . $pemasukan->file;

        // Hapus file dari storage
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        // Hapus data dari database
        $pemasukan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
