<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EUCATASTROPHE SHOESTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === " Home" ? 'active' : '' ) }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === " Sepatu" ? 'active' : '' ) }}" href="/sepatu">Sepatu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === " Kategori" ? 'active' : '' ) }}" href="/kategori">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === " Contact" ? 'active' : '' ) }}" href="/about">Tentang Kami</a>
        </li>
      </ul>


      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/dashboard" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Selamat datang, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                Logout
              </button>
            </form>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>
            Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>