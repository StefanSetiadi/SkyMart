<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {   
        $id_user = Auth::user()->id_user;
        $barang = Barang::all();
        $data = Transaksi::where('id_user',$id_user)->get();
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.transaksi.transaksi', compact('data','barang','tugas'));
    }

    public function tambahbrgtransaksistore(Request $request){
        $bantu = Barang::where('nama','LIKE','%' .$request->nama.'%')->get();
        if($bantu->isNotEmpty()){
            $cari = Transaksi::where('id_barang', $bantu->first()->id_barang)->get();
            if($cari->isNotEmpty()){
                $jumlah_baru = $cari->first()->jumlah_barang + $request->jumlah;
                $total_baru = $bantu->first()->harga * $jumlah_baru;
                $data = Transaksi::where('id_barang',$bantu->first()->id_barang)->update([
                    'jumlah_barang' => $jumlah_baru,
                    'subtotal' => $total_baru
                ]);
            } else{
                $data = Transaksi::create([
                    'id_barang' => $bantu->first()->id_barang,
                    'id_user' => $request->id_user,
                    'nama_barang' => $bantu->first()->nama,
                    'jumlah_barang' => $request->jumlah,
                    'subtotal' => $bantu->first()->harga * $request->jumlah
                ]);
            }   
        }
        return redirect()->route('home');
    }

    public function hapusbrgtransaksi($id_transaksi){
        $data = Transaksi::where('id_transaksi',$id_transaksi);
        $data->delete();

        return redirect()->route('home')->with('success','Data Berhasil Di Delete');
    }

    public function bayartransaksi(Request $request){
        $id_user = Auth::user()->id_user;
        $transaksi = Transaksi::where('id_user',$id_user)->get();
        $no = RiwayatTransaksi::max('no_riwayat') + 1;
        $totalharga = 0;
        foreach($transaksi as $item){
            $totalharga = $totalharga + $item->subtotal;
        }

        foreach ($transaksi as $item) {
            RiwayatTransaksi::create([
                'no_riwayat' => $no,
                'nama_barang' => Barang::where('id_barang', $item->id_barang)->first()->nama,
                'nama_karyawan' => Auth::user()->username,
                'jumlah' => $item->jumlah_barang,
                'subtotal' => $item->subtotal,
                'totalharga' => $totalharga
            ]);
        }
        Transaksi::where('id_user',$id_user)->delete();
        return redirect()->route('home');
    }
    
}
