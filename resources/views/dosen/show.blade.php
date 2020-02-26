@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Dosen
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Dosen</label>
                        <input type="text" name="a" value="{{$dosen->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Induk Pegawai Dosen</label>
                        <input type="text" name="b" value="{{$dosen->nipd}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
