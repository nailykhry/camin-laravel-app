@extends('layouts.main')

@section('container')

<div class="title my-5 text-center">
    <h1>Menampilkan kategori : {{ $title }}</h1>
</div>

<div class="container-xl">
    <div class="row">
        @foreach ($detail as $spt)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ $spt->s_foto }}" class="card-img-top" alt="{{ $spt->s_nama }} "
                    style="width: 400px; height:300px">
                <div class="card-body">
                    <h2 class="card-title text-warning">Rp{{ $spt->s_hargajual }},-</h2>
                    <h5 class="card-title">{{ $spt->s_nama }}</h5>
                    <p class="card-text">{{ $spt->s_kategori }}</p>
                    <a href="/sepatu/{{ $spt->id }}" class="btn btn-primary">Lihat Detail</a>

                    @can('admin')
                    <br> <br>
                    <div class="card-footer">
                        <small> - ADMIN -</small>
                        <p class="card-text-end"> Harga Beli : Rp {{ $spt->s_hargabeli }},-</p>
                        <p class="card-text-end"> Pengadaan : {{ $spt->created_at->format('d-m-Y') }}</p>
                        <p class="card-text-end"> Update : {{ $spt->updated_at->format('d-m-Y') }}</p>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('sepatu.destroy', $spt->id) }}" method="POST">
                                <a href="{{ route('sepatu.edit', $spt->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                        <br>
                    </div>
                    @endcan

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection