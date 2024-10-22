<!-- <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $user = User::all();
//         return view('admin.user.index', ['user' => $user]);
//     }

//     public function create()
//     {
//         return view('admin.user.create');
//     }

//     public function store(Request $request)
//     {
//         $data = $request->all();

//         $validate = Validator::make($data, [
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'email', 'unique:users'],
//             'password' => ['required', 'string'],
//             'departement' => ['required', 'in:Project Control,Piping,Sipil,Instrumen,Electrical,Proses'] 
//         ]);

//         if ($validate->fails()){
//             return redirect()->back()->withErrors($validate);
//         }

//         $email = User::where('email', $data['email'])->first();

//         if ($email) {
//             return redirect()->back()->with(['email' => 'Username sudah digunakan!']);
//         }

//         User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => Hash::make($data['password']),
//             'departement' => $data['departement']
//         ]);

//         return redirect()->route('user.index');  

//     }

//     // public function edit($id_petugas)
//     // {
//     //     $user = User::where('id_petugas', $id_petugas)->first();

//     //     return view('admin.petugas.edit', ['petugas' => $petugas]);
//     // }

//     // public function update(Request $request, $id_petugas)
//     // {
//     //     $data = $request->all();

//     //     $petugas = Petugas::find($id_petugas);

//     //     $petugas->update([
//     //         'nama_petugas' => $data['nama_petugas'],
//     //         'username' => $data['username'],
//     //         'password' => Hash::make($data['password']),
//     //         'telp' => $data['telp'],
//     //         'level' => $data['level']
//     //     ]);

//     //     return redirect()->route('petugas.index');

//     // }

//     public function destroy($email)
//     {
//         $user = User::findOrFail($email);
//         $email->delete();
        
//         return redirect()->route('user.index');
//     }
// }
