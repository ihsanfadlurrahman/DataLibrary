@extends('layouts.index')

@section('title', 'RE - Data Pengeluaran')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('header', 'Data Pengeluaran')
    
@section('content')
@if(Auth::user()->departement === 'Project Control')
    <div class="d-flex justify-content-between mb-2">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">Tambah Data</a>
        <a href="{{ route('membuat.laporan') }}" class="btn btn-primary">Generate Laporan</a>
    </div>  
@endif
<table class="table" id="pengeluaranTable">
        <thead>
            <tr>
                <th>No</th>
                <th>File</th>
                <th>kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal Pengeluaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expense as $k => $v)
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->nama_file }}</td>
                    <td>{{ $v->kategori }}</td>
                    <td>{{ $v->deskripsi }}</td>
                    <td>{{ $v->tgl_pengeluaran }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $v->file) }}" target="_blank" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        @if(Auth::user()->departement === 'Project Control')
                            <a href="{{ route('pengeluaran.download', $v->id_pengeluaran) }}" class="btn btn-primary"><i class="fa-solid fa-file-arrow-down"></i></a>
                            <form action="{{ route('pengeluaran.destroy', $v->id_pengeluaran) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></button>
                            </form>  
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#pengeluaranTable').DataTable();
        });
    </script>
@endsection