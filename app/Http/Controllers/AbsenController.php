<?php

namespace App\Http\Controllers;
use App\Absen;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AbsenController extends Controller
{

    public function PostAbsen(Request $req)
    {
        $absen = Absen::where('id_siswa',$req->id_siswa)->where('id_kegiatan',$req->id_kegiatan)->first();
        // if ($absen != null) {
        // return ['status' => 200, "data" => "data sudah ada"];

        // }else{

        $absen = new Absen;
        $absen->kategori_presensi = $req->kategori_presensi;
        $absen->waktu = Carbon::now();
        $absen->kehadiran = 1;
        $absen->keterangan = $req->keterangan;
        $absen->id_kegiatan = $req->id_kegiatan;
        $absen->status = 1;
        $absen->id_siswa = $req->id_siswa;
        $absen->id_penanggung_jawab = 2;
        $absen->save();
        // }
        return ['status' => 200, "data" => "masuk"];

    }
    public function cekAbsen(Request $req)
    {
        $absen = Absen::where('id_kegiatan',$req->id_kegiatan)->first();
        return ['status'=>200,'data'=>$absen];
    }

}
