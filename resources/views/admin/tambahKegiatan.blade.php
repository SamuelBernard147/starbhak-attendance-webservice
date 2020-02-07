@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah kegiatan</h1>
    </div>

    <form action="{{Route('post.tambah.kegiatan')}}" method="post">
        <label for="">Nama Kegiatan</label>
        <input type="text" class="form-control" name="nama_kegiatan">
        <div class="row mt-2 ">
            <div class="col-md-6">
                <label for="">Kategori</label>
                <select id="" class="form-control" name="kategori">
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Mata Pelajaran">Mata Pelajaran</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="">Penangung Jawab</label>
                <select id="" class="form-control" name="penangung_jawab">
                    @foreach (App\User::where('role','guru')->get() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="">Tangal Kegiatan</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                    <input type="date" class="form-control" name="tangal_kegiatan" id="tangal_pelaksanaan" name=""
                        placeholder="Tangal Pelaksanaan">
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Semester</label>
                <select class="form-control" id="" name="semester">
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div>
        </div>
        <label for="">Details</label>
        <textarea class="textarea" id="" cols="30" rows="10" name="details"></textarea>
        <input type="submit" class="btn btn-primary mt-3 mb-3 float-right">
</div>


</form>
</div>
@endsection
@section('javascript')
<script>
    $('#tangal_pelaksanaan').daterangepicker({
    locale: {
    format: 'DD-MM-YYYY'
    }
    });
</script>
@endsection