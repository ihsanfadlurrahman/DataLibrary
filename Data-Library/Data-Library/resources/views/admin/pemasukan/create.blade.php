@extends('layouts.index')

@section('title', 'RE - Input Data Pemasukan')

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
    <a href="{{ route('pemasukan.index') }}" class="text-primary">Data Pemasukan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Tambah Pemasukan</a>
@endsection
    
@section('content')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Input Data Pemasukan
            </div>
            <div class="card-body">
                <form action="{{ route('pemasukan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <input type="text" name="sumber" id="sumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pemasukan">Tanggal Pemasukan</label>
                        <input type="date" name="tgl_pemasukan" id="tgl_pemasukan" class="form-control" required>
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