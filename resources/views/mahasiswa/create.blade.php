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
                    <form action="{{route('mahasiswa.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label for="">Nama Dosen</label>
                            {{-- <input type="text" name="id_dosen"> --}}
                            <select name="id_dosen" class="form-control" required>
                                @foreach($dosen as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hobi</label>
                            <select class="form-control" id="js-multiple" name="hobi[]" multiple="multiple">
                                @foreach ($hobi as $data)
                                    <option value="{{$data->id}}">{{$data->hobi}}</option>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#js-multiple').select2();
        });
    </script>
@endpush
