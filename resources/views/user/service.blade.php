<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service</title>

  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Boostrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Inter", sans-serif;
      background-color: #F0F0F0;
    }

    .navbar {
      position: fixed;
      width: 100%;
      height: 80px;
    }

    .btn-link {
      text-decoration: none;
    }

    .card-container {
      margin-top: 120px;
      display: flex;
      flex-wrap: wrap;
    }

    .card {
      width: calc(30% - 20px);
      margin: 10px;
      transition: transform 0.3s;
      display: flex;
      flex-direction: column;
      margin-bottom: 1rem;
    }

    .card .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .card-title {
      margin-top: 10px;
      font-size: 18px;
      font-weight: bold;
    }

    .card p {
      margin-top: 10px;
      font-size: 14px;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }

    .more {
      display: none;
    }

    .center-button {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .card:hover {
      transform: scale(1.1);
    }

    .more {
      display: none;
    }

    footer {
      margin-top: 70px;
      background-color: #303030;
      min-height: 100px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
    }

    footer p {
      text-align: left;
      line-height: 100px;
      color: #fff;
      font-size: 16px;
      font-weight: 400;
    }

    footer p a {
      color: #fff;
      transition: all .3s;
      position: relative;
      z-index: 3;
    }

    footer p a:hover {
      opacity: 0.75;
    }

    @media (max-width: 480px) {
      .navbar {
        background-color: black;
      }

      .navbar .nav-link,
      .navbar .dropdown-menu {
        color: #fff;
      }

      .navbar .dropdown-menu a {
        transition: all .3s;
        position: relative;
        z-index: 3;
      }

      .navbar .dropdown-menu a:hover {
        opacity: 0.75;
      }

      .card-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('homepage') }}"><strong>SemestaGroup</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('homepage') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('service') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('booking') }}">Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
          </li>
        </ul>

        <ul class="navbar-nav fs-5 ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" arialabelledby="userDropdown">
              <div class="text-center">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width:100px;" alt="Avatar" />
                <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
              </div>
              <div class="dropdown-divider"></div>
              <div>
                <a class="dropdown-item" href="{{ url('userProfile') }}"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('actionLogout') }}" style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i> Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- content -->
  <div class="container">
    <div class="card-container">
      @foreach ($acara as $isi)
      <div class="card h-100">
        <img src="{{ $isi['gambar'] }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $isi['nama'] }}</h5>
          <p>{{ $isi['deskripsi2'] }}<span class="dots">...</span></p>
          <h6>What will you get?</h6>
          <ul class="more">
            @foreach (explode("\n", $isi['deskripsi']) as $point)
              <li>{{ $point }}</li>
            @endforeach
          </ul>
          <button onclick="myFunction(this)" class="btn btn-link">Read more</button>
        </div>
      </div>
      @endforeach
    </div>

    <div class="center-button">
      <a href="{{ url('booking') }}" class="btn btn-primary">Booking Now</a>
    </div>
  </div>


  <!-- footer -->
  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>SemestaGroup @ 2023. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    function myFunction(btn) {
      var card = btn.closest('.card');
      var dots = card.querySelector('.dots');
      var moreList = card.querySelector('.more');
      var btnText = btn;

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreList.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreList.style.display = "block";
      }
    }
  </script>
</body>

</html>