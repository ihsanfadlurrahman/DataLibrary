<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index', ['karyawan' => $karyawan]);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect()->route('karyawan.index')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.karyawan.show', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }
    public function store(Request $request)
    {
        DB::table('karyawans')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'departement' => $request->departement,
        ]);
        return redirect()->route('karyawan.index');
    }

    public function edit($id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();

        return view('admin.karyawan.edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id_karyawan)
    {
        $data = $request->all();

        $karyawan = Karyawan::findOrFail($id_karyawan);

        $karyawan->update([
            'name' => $data['name'],
            'departement' => $data['departement'],
        ]);

        return redirect()->route('karyawan.index');
    }

    public function destroy($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}
