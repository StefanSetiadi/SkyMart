<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('layouts.user_pages.register');
    }
    
    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'active' => 1
        ]);
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $file->move('images/faces/',$file->getClientOriginalName());
            $user->profil = $file->getClientOriginalName();
            $user->save();
        }

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}