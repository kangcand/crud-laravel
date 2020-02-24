<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eloquent</title>
</head>
<body>

        <h3> {{ $mahasiswa->nama }}  <small></small></h3>
        <h5>Hobi :
            @foreach($mahasiswa->hobi as $val)
                <small>{{ $val->hobi }}, </small>
            @endforeach
        </h5>
        <h4>
            <li>
                Nama Wali : <strong>{{ $mahasiswa->wali->nama }}</strong>
            </li>
            <li>
                Dosen Pembimbing : <strong>{{ $mahasiswa->dosen->nama }}</strong>
            </li>
        </h4>
        <hr>

</body>
</html>
