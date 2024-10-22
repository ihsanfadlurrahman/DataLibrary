{{-- @extends('layouts.index')

@section('title', 'Form Edit Karyawan')
    
@section('css')
    <style>
        .text-primary:hover{
            text-decoration: underline;
        }

        .text-grey{
            color: #6c757d;
        }

        .text-grey:hover{
            color: #6c757d;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('karyawan.index') }}" class="text-primary">Data Karyawan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Karyawan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Edit Karyawan
                </div>
                <div class="card-body">
                    <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_karyawan" value="{{ $karyawan->id_karyawan }}">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" value="{{ $karyawan->name }}" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="email" value="{{ $karyawan->email }}" name="email" id="email" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="departement">Departement</label>
                            <input type="text" value="{{ $karyawan->departement }}" name="departement" id="departement" class="form-control" readonly>
                        </div>
                        <button class="btn btn-warning text-white" type="submit" style="width: 100%">UPDATE</button>
                    </form>
                    <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-2" type="submit" style="width: 100%">HAPUS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}