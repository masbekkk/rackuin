<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="rak" />
    <meta name="author" content="jual rak" />
    <title>Rackuin</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="{{ asset ('frontend/stylesheet" href="css/custom.css;') }}" />

    

  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">LOGO</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " href="{{route('homepage')}}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('contact')}}">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('produk')}}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('coba')}}">Berita</a>
            </li>
            <li class="nav-item">
            <a href="https://www.instagram.com"><img src="assets/instagram.png" class="navbar-img"></a>
            </li>
            <li class="nav-item">
            <a href="https://id-id.facebook.com"><img src="assets/facebook.png" class="navbar-img"></a>
            </li>
            <li class="nav-item">
            <a href="https://wa.me/6281999950241"><img src="assets/whatsapp.png" class="navbar-img"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    @yield('content')
    <!-- Footer-->
    <footer class="footer">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; Your Website 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>

    <script>
      const navLinks = document.querySelectorAll('.nav-link');

      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          // Hapus kelas 'active' dari tautan yang saat ini aktif (jika ada)
          const currentActive = document.querySelector('.nav-link.active');
          if (currentActive) {
            currentActive.classList.remove('active');
          }

          // Tambahkan kelas 'active' ke tautan yang baru di-klik
          this.classList.add('active');
        });
      });
    </script>


  </body>
</html>
