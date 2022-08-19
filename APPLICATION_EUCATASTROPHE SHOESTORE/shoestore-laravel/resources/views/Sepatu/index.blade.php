@extends('layouts.main')

@section('container')

<h1 class="mb-5 pt-5 text-center">{{ $title }}</h1>

<div class="row justify-content-center">
  <div class="col-md-6">
    <form action="sepatu">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Sepatu . . ." name="search" value={{ request('search')
          }}>
        <button class="btn btn-warning" type="submit">Cari</button>
      </div>
    </form>
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

@can('admin')
<div class="card border-0 shadow rounded mb-5">
  <div class="card-body">
    <a href="{{ route('sepatu.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Sepatu</a>
  </div>
</div>
@endcan


@if (count($sepatu)==0)
<p class="text-center fs-4">Tidak ada data sepatu</p>

@else
<div class="container-xl">
  <div id="carouselExampleDark" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php 
          $len = count($sepatu);
      ?>
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ $sepatu[0]->s_foto }}" class="d-block" alt="coba" style="width: 1500px; height:700px">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sepatu[0]->s_nama }}</h5>
        </div>
      </div>
      <?php if($len>1){ ?>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ $sepatu[1]->s_foto }}" class="d-block" alt="coba2" style="width: 1500px; height:700px">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sepatu[1]->s_nama }}</h5>
        </div>
      </div>
      <?php }
      if($len>2){ ?>
      <div class="carousel-item">
        <img src="{{ $sepatu[2]->s_foto }}" class="d-block" alt="coba3" style="width: 1500px; height:700px">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sepatu[2]->s_nama }}</h5>
        </div>
      </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
@endif


<div class="container-xl">
  <div class="row">
    @foreach ($sepatu as $spt)
    <div class="col-md-4 mb-3">
      <div class="card">
        <img src="{{ $spt->s_foto }}" class="card-img-top" alt="{{ $spt->s_nama }} " style="width: 400px; height:300px">
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
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sepatu.destroy', $spt->id) }}"
                method="POST">
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
  {{-- LINK --}}
  <div class="d-flex justify-content-end">{{ $sepatu->links() }}</div>
</div>

@endsection