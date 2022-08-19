@extends('layouts.main')

@section('container')

<div class="container my-5">
    <div class="my-5 text-center">
        <h1>LIHAT KATEGORI</h1>
    </div>
    <div class="d-grid gap-4 col-8 mx-auto">
        @foreach ($kategori as $kat)
        <button class="btn btn-outline-warning" type="button" onclick="location.href='kategori/{{ $kat->id }}'">
            <h3> {{ $kat->k_kategori }}
            </h3>
        </button>
        @endforeach
    </div>

</div>

@endsection