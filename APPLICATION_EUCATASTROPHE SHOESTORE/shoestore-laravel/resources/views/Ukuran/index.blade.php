@extends('layouts.main')

@section('container')

{{-- TOMBOL UNTUK MENAMBAH UKURAN --}}
<!-- Notifikasi menggunakan flash session data -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif


{{-- CONTAINER --}}
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('storage/'.$sepatu->s_foto) }}" class="card-img-top" alt="{{ $sepatu->s_nama }}"
                style="width: 600px; height:400px">
        </div>
        <div class="col px-5">
            <div class="title">
                <h1>{{ $sepatu->s_nama }}</h1>
                <p>Belum ada penilaian | 0 Terjual</p>
            </div>

            <div class="content">
                <h1 class="text-warning">Rp {{ $sepatu->s_hargajual }},-</h1>
                <table>
                    <tr>
                        <td class="pr-5">Pengiriman</td>
                        <td>Pengiriman Ke</td>
                        <td>Pilih kota dropdown</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ongkos Kirim</td>
                        <td>Lihat Ongkos Kirim</td>
                    </tr>
                    <tr>
                        <td class="py-3">Ukuran</td>
                        <td>
                            <select name="ukuran" id="ukuran">
                                @foreach ($ukuran as $uk)
                                <option value="{{ $uk->u_ukuran }}">{{ $uk->u_ukuran }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3">Kuantitas</td>
                        <td>
                            <div class="btn-group pb-3" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-secondary" onclick="tambahKuantitas()"><i
                                        class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-outline-secondary" id="quantity"
                                    onclick="reset()">(0)</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="kurangiKuantitas()"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="button" class="btn btn-outline-warning"><i class="bi bi-cart-plus"></i> Masukkan ke
                        keranjang</button>
                    <button type="button" class="btn btn-warning">Beli sekarang</button>
                </div>
            </div>

        </div>
    </div>

    <br>
    <hr>
    <br>

    <div class="detail">
        <h1>Detail Produk</h1>
        <table>
            <tr>
                <td style="padding-right: 50px;"><b>Bahan</b></td>
                <td>: {{ $sepatu->s_bahan }}</td>
            </tr>
            <tr>
                <td colspan="2"> <b>Stock</b> </td>
            </tr>
            @foreach ($ukuran as $ukr)
            <tr>
                <td>Nomor {{ $ukr->u_ukuran }}</td>
                <td>: {{ $ukr->u_stock }}</td>
                @can('admin')
                <td class="text-warning px-5"> {{ $ukr->u_deksripsi }}</td>
                @endcan
            </tr>
            @endforeach
        </table>


        @can('admin')
        <div class="card border-0 rounded my-3">
            <div>
                <a href="/sepatu/{{ $sepatu->id }}/create" class="btn btn-md btn-success mb-3">Tambah Ukuran</a>
            </div>
        </div>
        @endcan


        <h1 class="mt-5">Deskripsi Produk</h1>
        <p>{!! $sepatu->s_deskripsi !!}</p>
    </div>

    <hr>
    <h3 class="my-5">PRODUK LAINNYA</h3>

    <div class="container-fluid">
        <div class="row">
            @foreach ($sPaginate as $spt)
            <div class="col-md-3 mb-5">
                <div class="card">

                    <img src="{{ asset('storage/'.$spt->s_foto) }}" class="card-img-top" alt="{{ $spt->s_nama }}"
                        style="width: 440px; height:300px">
                    <div class="card-body">
                        <h2 class="card-title text-warning">Rp{{ $spt->s_hargajual }},-</h2>
                        <h5 class="card-title">{{ $spt->s_nama }}</h5>
                        <p class="card-text">{{ $spt->s_kategori }}</p>
                        <a href="/sepatu/{{ $spt->id }}" class="btn btn-primary">Lihat Detail</a>

                        @can('admin')
                        <br> <br>
                        <div class="card-footer">
                            <small> - ADMIN -</small>
                            <p class="card-text-end"> Pengadaan : {{ $spt->created_at->format('d-m-Y') }}</p>
                            <p class="card-text-end"> Update : {{ $spt->updated_at->format('d-m-Y') }}</p>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('sepatu.destroy', $spt->id) }}" method="POST">
                                    <a href="{{ route('sepatu.edit', $spt->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
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
            {{-- LINK --}}
            <div class="d-flex justify-content-end">{{ $sPaginate->links() }}</div>
        </div>

    </div>






    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
    @endsection