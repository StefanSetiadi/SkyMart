<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.profile.profile',compact('tugas'));
    }
    public function editdatauser(Request $request,$id_user){
        $data = User::where('id_user',$id_user)->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $file->move('images/faces/',$file->getClientOriginalName());
            $filename= $file->getClientOriginalName();
            $data = User::where('id_user',$id_user)->update(['profil' => $filename]);
        }

        return redirect()->route('profile')->with('success','Data Berhasil Di Update');
    }
    
    public function hapuskaryawan($id_karyawan){
        $data = User::where('id_user',$id_karyawan);
        $data->delete();

        return redirect()->route('datakaryawan')->with('successdelete','Data Berhasil Di Delete');
    }

}
