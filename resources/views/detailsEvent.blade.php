@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$data->nama_kegiatan}}</h1>
    </div>

    <div class="row">



    </div>

    <!-- Content Row -->

    <div class="card shadow ">
        <div class="card-header">
            Details
        </div>
        <div class="card-body">
            {!!$data->Deskripsi_kegiatan!!}
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header">
            Absen
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-5">
                        <div class="card-body">
                            <img src="https://chart.googleapis.com/chart?chs=177x177&cht=qr&chl={{$data->id_kegiatan}}/{{$data->kategori_presensi}}&chld=L|1&choe=UTF-8"
                                alt="" srcset="" style="width:100%">

                            <h5 class="text-center">Scan Qrcode dengan aplikasi</h5>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <table id="absen_list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th style="width:200px;">Nama</th>
                                <th style="width:100px;">Kelas</th>
                                <th>NIPD</th>
                                <th style="width:150px;">Jenis Kelamin</th>
                                <th style="width:250px;">Waktu Absen</th>

                            </tr>
                        </thead>
                        <tbody>

                            {{-- {{dd()}} --}}
                            @foreach (App\Absen::where('id_kegiatan',$data->id_kegiatan)->where('waktu','like','%'.Carbon\Carbon::now()->format('Y-m-d').'%')->get() as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                            <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->nama}}</td>
                            <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->KELAS}}</td>
                            <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->nipd}}</td>
                            <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->jenis_kelamin}}</td>
                            <td>{{$data->waktu}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>


@endsection
<script>
    //     setInterval(function(){
   
//     $.ajax({
//      type: "get",
//      url: '{{url("/cek/absen?id_kegiatan=2")}}',

//      success: function(data){
//         console.log(data);
        
    
//      }
// });
// });
</script>