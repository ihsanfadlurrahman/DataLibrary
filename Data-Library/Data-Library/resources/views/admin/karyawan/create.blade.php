@extends('layouts.index')

@section('title', 'RE - Input Data Karyawan')

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
    <a href="#" class="text-grey">Tambah Karyawan</a>
@endsection
    
@section('content')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Input Data Karyawan
            </div>
            <div class="card-body">
                <form action="{{ route('karyawan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="departement" class="form-label">Departement</label>
                        <select name="departement" id="departement" class="custom-select">
                            <option value="" selected>Pilih Departement</option>
                            <option value="Project Control">Project Control</option>
                            <option value="Piping">Piping</option>
                            <option value="Sipil">Sipil</option>
                            <option value="Instrumen">Instrumen</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Proses">Proses</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit" style="width: 100%">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-6 col-12">
        @if (Session::has('username'))
        <div class="alert alert-danger">
            {{ Session::get('username') }}
        </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
        @endif
    </div> --}}
</div>
@endsection