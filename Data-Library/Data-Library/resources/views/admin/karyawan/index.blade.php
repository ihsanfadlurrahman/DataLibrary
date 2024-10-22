@extends('layouts.index')

@section('title', 'RE - Data Karyawan')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('header', 'Data Karyawan')
    
@section('content')
<a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-2">Tambah Karyawan</a>
    <table class="table" id="karyawanTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Departement</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k => $v)
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->departement }}</td>
                    <td><a href="{{ route('karyawan.show', $v->id_karyawan) }}" style="text-decoration: underline"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('karyawan.edit', $v->id_karyawan) }}" style="text-decoration: underline"><i class="fa-solid fa-pen-to-square"></i></a>
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
            $('#karyawanTable').DataTable();
        });
    </script>
@endsection