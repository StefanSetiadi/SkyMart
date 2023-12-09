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
  
class SidebarController extends Controller
{

    public function tentang()
    {
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        return view('layouts.tentang.tentang',compact('tugas'));
    }

    public function datakaryawan()
    {
        $id_user = Auth::user()->id_user;
        $tugas = Tugas::where('id_user', $id_user)->get();
        $data = User::where('role','karyawan')->paginate(5);
        return view('layouts.datakaryawan.data',compact('tugas','data'));
    }

    public function tambahdatatugas(Request $request){
        $data = Tugas::create([
            'id_user' => $request->id_user,
            'tugas' => $request->tugas
        ]);
        return back();
    }

    public function hapusdatatugas($id_tugas){
        $data = Tugas::where('id_tugas',$id_tugas);
        $data->delete();

        return back();
    }

}