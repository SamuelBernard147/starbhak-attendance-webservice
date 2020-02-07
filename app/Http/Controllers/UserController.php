<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kegiatan;
use App\User;
use App\Absen;
use Hash;
use Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ApiLogin(Request $req)
    {

        $user = User::where('email',$req->email)->first();
        if ($user != null) {
             if (Hash::check($req->password,$user->password)) {
            return ['status'=>200,'data'=>$user];
        } else {
            return ['status'=>404,'data'=>null];
        }
        } else {
             return ['status'=>404,'data'=>'email salah'];

        }
        
      
        
        
    }
    public function ApiDataUser(Request $req)
    {
        $user = Siswa::where('id_siswa',$req->id_user)->first();
        return ["status" => 200 ,"data"=>$user];

    }
    public function ApiRiwayatAbsen(Request $req)
    {
        $absen = Absen::where('id_siswa',$req->id_siswa)->where('id_kegiatan',$req->id_kegiatan)->get();
        return ['status'=>200,'data'=>$absen];
    }

    public function ApiAllKegiatan(Request $req)
    {
        $kegiatan = Kegiatan::all();
        return ['status'=>200,'data'=>$kegiatan];
    }
       public function ApiRiwayatPerKegiatan(Request $req)
    {
        $absen = Absen::where('id_kegiatan',$req->id_kegiatan)->get();
        return ['status'=>200,'data'=>$absen];
    }

    public function viewAllAbsen(Request $req)
    {
        $absen = Absen::where('id_kegiatan',$req->id_kegiatan)->get();
        return  view('absen',['absen'=>$absen]);

    }
    public function ApiKegiatan(Request $req)
    {
        $kegiatan = Kegiatan::where('id_kegiatan',$req->id_kegiatan)->first();
        return ['status'=>200 ,'data'=>$kegiatan];
    }
    public function ViewReportAbsen(Request $req)
    {
             $kegiatan = Kegiatan::all();
             return view('ReportAbsen',['kegiatan'=>$kegiatan]);
    }
    public function viewTambahKegiatan(Request $req)
    {
        return view('admin.tambahKegiatan');
        
    }
    public function postTambahKegiatan(Request $req)
    {
        $kegiatan = new Kegiatan;
        $kegiatan->id_pj =  $req->penangung_jawab;
        $kegiatan->kategori = $req->kategori;
        $kegiatan->nama_kegiatan= $req->nama_kegiatan;
        $kegiatan->Deskripsi_kegiatan = $req->details;
        $kegiatan->jadwal_kegiatan = $req->tangal_kegiatan;
        $kegiatan->semester = $req->semester;
        $kegiatan->tahun_pelajaran = Carbon\Carbon::now()->format('Y');
        $kegiatan->save();
        return redirect(Route('home'));

    }



}


