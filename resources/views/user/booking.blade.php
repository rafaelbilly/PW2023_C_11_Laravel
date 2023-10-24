<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    }

    .navbar {
      position: fixed;
      width: 100%;
    }

    .card-container {
      margin-top: 150px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .card {
      flex: 1;
      width: 18rem;
      margin: 10px;
    }

    .checklist {
      list-style: none;
    }

    .checklist li {
      display: flex;
      align-items: center;
    }

    .checklist li::before {
      content: '\2713';
      color: green;
      margin-right: 5px;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card-body h6 {
      margin-top: 15px;
    }

    .btn-primary {
      margin-top: 10px;
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100px;
      background-color: #303030;
      min-height: 100px;
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
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><strong>SemestaGroup</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('dashboard') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('service') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('booking') }}">Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
          </li>
        </ul>

        <ul class="navbar-nav fs-5 ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> User
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="card-container">
    @foreach ($booking as $isi)
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title"><strong>{{ $isi['nama'] }}</strong></h5>
        <h1 class="card-title"><strong>{{ $isi['harga'] }}</strong></h1>
        <a href="#" class="btn btn-primary">Booking</a>
        <h6 class="card-title" style="margin-top: 30px;">Includes:</h6>
        <ul class="checklist">
          @foreach (explode("\n", $isi['deskripsi']) as $point)
          <li>{{ $point }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    @endforeach
  </div>

  <!-- footer -->
  <footer class="footer footer-no-gap">
    <div class="container">
      <div class="col-lg-8">
        <p>SemestaGroup @ 2023. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>