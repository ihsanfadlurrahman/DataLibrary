@extends('layouts.index')

@section('title', 'Halaman Dashboard')
    
@section('header', 'Dashboard')
    
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Data Pemasukan</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ App\Models\Pemasukan::count() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Data Pengeluaran</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ App\Models\Pengeluaran::count() }}
                    </div>
                </div>
            </div>
        </div> --}}
        @if(Auth::user()->departement === 'Admin')
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Data Karyawan</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ App\Models\Karyawan::count() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection