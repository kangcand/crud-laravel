@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.update',$mhs->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" value="{{$mhs->nama}}" class="form-control" readonly>
                        </div>
                         <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" name="nim" value="{{$mhs->nim}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Dosen</label>
                            <input type="text" name="nim" value="{{$mhs->dosen->nama}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Daftar Hobi</label>
                            @foreach ($mhs->hobi as $item)
                                <li>{{$item->hobi}}</li>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-primary btn-block">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
