@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="" class="btn btn-primary">Report Absen</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Absen Hari ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Kegiatan Hari ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
            Pembelajaran Hari ini
        </div>
        <div class="card-body">
            <div class="row">
                @foreach (App\Kegiatan::where('kategori','Mata Pelajaran')->where('id_pj',Auth::user()->id)->get() as
                $data)
                <div class="col-md-4">
                    <a href="{{Route('details.event',$data->id_kegiatan)}}" style="text-decoration:none">

                        <div class="card  mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{$data->nama_kegiatan}}</h6>
                            </div>
                            <div class="card-body  text-muted"
                                style="height:135px; width: 100%;overflow: hidden;text-overflow: ellipsis;">
                                {{$data->Deskripsi_kegiatan}}
                            </div>
                            <div class="card-footer text-muted bg-white " style="border-top:0px ">
                                <p class="p-0 m-0"> {{$data->jadwal_kegiatan}} <span class="float-right">Total hadir :
                                        30</span></p>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="card shadow mt-5">
        <div class="card-header">
            Kegiatan Hari ini
        </div>
        <div class="card-body">
            <div class="row">
                @foreach (App\Kegiatan::where('kategori','Kegiatan')->where('id_pj',Auth::user()->id)->get() as $data)
                <div class="col-md-4">
                    <a href="{{Route('details.event',$data->id_kegiatan)}}" style="text-decoration:none">

                        <div class="card  mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{$data->nama_kegiatan}}</h6>
                            </div>
                            <div class="card-body  text-muted"
                                style="height:135px; width: 100%;overflow: hidden;text-overflow: ellipsis;">
                                {{-- {{}} --}}
                                <?= strip_tags($data->Deskripsi_kegiatan) ?>
                            </div>
                            <div class="card-footer text-muted bg-white " style="border-top:0px ">
                                <p class="p-0 m-0"> {{$data->jadwal_kegiatan}} <span class="float-right">Total hadir :
                                        30</span></p>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection