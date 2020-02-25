<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Blade Templating</title>
</head>
<body>

    {{-- membrikan ruang kosong --}}
    @yield('konten')
    {{-- yang bisa di isi oleh section --}}
    <footer>Latihan Blade Templating</footer>
@include('layouts.nav')

</body>
</html>
