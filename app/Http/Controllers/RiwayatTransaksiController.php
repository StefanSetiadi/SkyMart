<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    public function riwayat_transaksi()
    {
        $data = RiwayatTransaksi::all();
        $barang = Barang::all();
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();

        return view('layouts.riwayat_transaksi.riwayat', compact('data','tugas','barang'));
    }

    public function hapusriwayat($no_riwayat){
        $data = RiwayatTransaksi::where('no_riwayat',$no_riwayat);
        $data->delete();

        return redirect()->route('riwayat_transaksi')->with('success','Data Berhasil Di Delete');
    }
}
