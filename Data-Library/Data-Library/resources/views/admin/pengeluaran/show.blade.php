@extends('layouts.index')

@section('title', 'Detail Pengeluaran')
    
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
    <a href="{{ route('pengeluaran.index') }}" class="text-primary">Data Pengeluaran</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Pengeluaran</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Data Pengeluaran
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Jumlah</th>
                                <td>:</td>
                                <td>{{ $expense->jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>:</td>
                                <td>{{ $expense->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>:</td>
                                <td>{{ $expense->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pemasukan</th>
                                <td>:</td>
                                <td>{{ $expense->tgl_pengeluaran }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection