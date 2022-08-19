@extends('layouts.main')

@section('container')

<!-- Bootstrap core CSS -->
<link href="css/home.css" rel="stylesheet">


<main>


  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">EUCATASTROPHE SHOESTORE</h1>
      <p class="lead fw-normal">Serba ada untuk berbagai macam alas kaki yang memenuhi setiap kebutuhan Anda.</p>
      <a class="btn btn-outline-warning" href="/sepatu">Lihat Sepatu</a>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Wanita</h2>
          <p class="lead">Dapatkan sepatu seperti heels</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="img/heels.png" style="width: 20em" alt="heels">
        </div>
      </div>
      <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Sports</h2>
          <p class="lead">Temukan sepatu yang nyaman untuk olahraga</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="img/sneakersWhite.png" style="width: 20em" alt="sneakers">
        </div>
      </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Casual</h2>
          <p class="lead">Mau jalan santai? cari sepatunya!</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="img/casual.png" style="width: 25em" alt="casual">
        </div>
      </div>
      <div class="bg-warning me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Formal</h2>
          <p class="lead">Ke acara formal tanpa takut lagi!</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="img/formal.png" style="width: 25em" alt="formal">
        </div>
      </div>
    </div>

  </div>
</main>


@endsection