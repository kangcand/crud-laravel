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
                            <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <select name="id_mahasiswa" class="form-control" required>
                                @foreach($mhs as $data)
                                <option value="{{$data->id}}"
                                    {{ $data->id == $wali->id_mahasiswa ? "selected" : "" }}>
                                    {{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
