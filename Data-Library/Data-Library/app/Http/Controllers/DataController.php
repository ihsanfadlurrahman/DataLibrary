<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use App\Models\pengeluaran;
use Illuminate\Http\Request;

class DataController extends Controller
{
    function index()
    {
        $income = pemasukan::all()->count();

        $expense = pengeluaran::all()->count();
        
        return view('Admin.Dashboard.index', ['income' => $income, 'expense' => $expense]);
    }
}
