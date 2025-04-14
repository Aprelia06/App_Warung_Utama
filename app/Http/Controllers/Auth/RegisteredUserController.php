<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Import QR Code
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan halaman register
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi user baru + auto generate QR Code
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'poin' => 0, // Poin default 0
        ]);

        // Data yang mau dimasukin ke QR Code
        // $qrData = "Nama: {$user->name}";
        $qrData = "ID: {$user->userID}\nNama: {$user->name}";

        // Generate QR Code (SVG)
        $qrCode = QrCode::format('svg')->size(200)->generate($qrData);

        // Simpan QR Code ke storage/app/public/qrcodes/userID.svg
        $fileName = 'qrcodes/' . $user->id . '.svg';
        Storage::disk('public')->put($fileName, $qrCode);

        // Simpan path ke kolom qr_code
        $user->qr_code = $fileName;
        $user->save();

        // Trigger event Registered
        event(new Registered($user));

        // Auto login
        Auth::login($user);

        // Redirect ke dashboard/home
        return redirect(RouteServiceProvider::HOME)->with('success', 'Registrasi berhasil! QR Code berhasil dibuat.');
    }
}
