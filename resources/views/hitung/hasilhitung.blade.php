@extends('hitung.formhitung')

@section('container')
<div class="w-full bg-black border border-white text-center text-white drop-shadow-xl m-auto mt-7 p-5 rounded-md">
    <h1>Diameter Tabung : {{$dt}}</h1>
    <h1>Jari-jari Tabung : {{$r}}</h1>
    <h1>Tinggi Air dalam Tabung : {{$ta}}</h1>
    <h1>Volume Air nya adalahhh {{ $hasil }} XD</h1>
</div>
@endsection