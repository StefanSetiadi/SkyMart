<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function barang(Request $request)
    {   
        if($request->has('search')){
            $data = Barang::where('nama','LIKE','%' .$request->search.'%')->get();
        } else {
            $data = Barang::paginate(5);
        }
        $user = User::all();
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.barang.barang', compact('data','user','tugas'));
    }

    public function hapusbarang($id_barang){
        $data = Barang::where('id_barang',$id_barang);
        $data->delete();

        return redirect()->route('barang')->with('successdelete','Data Berhasil Di Delete');
    }

    public function tambahbarang()
    {
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.barang.tambah', compact('tugas'));
    }

    public function tambahdatabarang(Request $request){
        $data = Barang::create([
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'harga' => $request->harga,
        ]);
        return redirect()->route('tambahbarang')->with('success','Data Berhasil Di Tambahkan');
    }
    
    public function editbarang($id_barang){
        $data = Barang::where('id_barang',$id_barang)->first();
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.barang.edit',compact('data','tugas'));
    }

    public function editdatabarang(Request $request,$id_barang){
        $id_user = Auth::user()->id_user;
        $data = Barang::where('id_barang',$id_barang)->update([
            'id_user' => $id_user,
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang')->with('success','Data Berhasil Di Update');
    }
}
