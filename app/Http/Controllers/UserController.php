<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'in:admin,pelanggan,toko',
            ]);
    
            // Buat pengguna baru
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => $validatedData['role'] ?? 'pelanggan',
            ]);
    
            return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
        }


        public function tambahPoin(Request $request)
        {
            $request->validate([
                'userID' => 'required|exists:users,userID',
                'point' => 'required|numeric|min:1'
            ]);

            $user = User::find($request->userID);
            $user->point += $request->point; // Tambahkan poin
            $user->save();

            return redirect()->back()->with('success', 'Point berhasil ditambahkan ke user ' . $user->name);
        }


        // public function showTambahPoinForm()
        // {
        //     $users = User::all();
        //     return view('admin.tambah_poin', compact('users'));
        // }

        public function showTambahPoinForm()
    {
        $users = User::all(); // Ambil semua user
        return view('admin.tambah_poin', compact('users'));

        
    }
    // Fungsi untuk mereset poin user
    public function resetPoin($id)
    {
        $user = User::findOrFail($id);
        $user->point = 0; // Reset poin ke 0
        $user->save();

        return redirect()->back()->with('success', 'Poin berhasil direset!');
    }

    // Proses tambah poin
    

    }
    