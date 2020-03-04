@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Wali
                </div>
                <div class="card-body">
                    <form action="{{route('wali.update',$wali->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Wali</label>
                            <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                             <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" readonly>
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
