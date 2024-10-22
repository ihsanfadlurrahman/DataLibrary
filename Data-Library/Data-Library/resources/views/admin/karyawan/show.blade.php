@extends('layouts.index')

@section('title', 'Detail Karyawan')
    
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

        .btn-purple{
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
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
                    <div class="text-center">
                        Data Karyawan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td>:</td>
                                <td>{{ $karyawan->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $karyawan->name }}</td>
                            </tr>
                            <tr>
                                <th>Departement</th>
                                <td>:</td>
                                <td>{{ $karyawan->departement }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection