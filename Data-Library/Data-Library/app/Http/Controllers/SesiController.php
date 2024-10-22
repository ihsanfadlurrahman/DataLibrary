<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->departement == 'Admin') {
                return redirect('admin');
            } elseif (in_array(Auth::user()->departement, ['Project Control','Piping','Sipil','Instrumen','Electrical','Proses'])) {
                return redirect('admin/karyawan');
            }
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function formRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'email', function($attribute, $value, $fail) {
                if (!str_ends_with($value, '@ptre.co.id')) {
                    $fail('Harus menggunakan email perusahaan');
                }
            }],
            'password' => ['required'],
            'departement' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Check if the email is in the karyawan table
        $karyawan = Karyawan::where('email', $request->email)->first();

        if (!$karyawan) {
            return redirect()->back()->withErrors('Email tidak ada!')->withInput();
        }

        // Check if the department matches
        if ($karyawan->departement !== $request->departement) {
            return redirect()->back()->withErrors('Itu bukan departemen Anda!')->withInput();
        }

        $email = User::where('email', $request->email)->first();

        if ($email) {
            return redirect()->back()->withErrors('Email Sudah Terdaftar!')->withInput();
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'departement' => $data['departement'],
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
