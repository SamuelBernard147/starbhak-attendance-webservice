@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

    </div>

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
            Absen Siswa
        </div>
        <div class="card-body">
            <table id="absen_all_list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>

                        <th style="width:200px;">Nama</th>
                        <th style="width:100px;">Kelas</th>
                        <th style="width:180px;">Kegiatan</th>
                        <th>NIPD</th>
                        <th style="width:120px;">Jenis Kelamin</th>
                        <th style="width:250px;">Waktu Absen</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->nama}}</td>
                        <td>{{App\Siswa::where('id_siswa',$data->id_siswa)->first()->KELAS}}</td>
                        <td>{{App\Kegiatan::where('id_kegiatan',$data->id_kegiatan)->first()->nama_kegiatan}}</td>
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


@endsection
@section('javascript')
<script>
    $('#absen_all_list').DataTable({
            "paging": true,
            "pageLength": 30,
            "lengthChange": false,
            "order": [[ 5, "desc" ]],
            
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            columnDefs: [{
            "targets": [0],
            "visible": false,
            "searchable": false
            }],
            });
</script>
@endsection