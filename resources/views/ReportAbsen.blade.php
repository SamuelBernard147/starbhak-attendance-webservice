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
            Report Kelas
        </div>
        <div class="card-body">
            <table id="absen_all_list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Kategori</th>
                        <th>Deskripsi Kegiatan</th>
                        <th style="width:130px">Jadwal Kegiatan</th>
                        <th style="width:130px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_kegiatan}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->Deskripsi_kegiatan}}</td>
                        <td>{{$item->jadwal_kegiatan}}</td>
                        <td><a href="" class="btn btn-primary">Download Excel</a></td>
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