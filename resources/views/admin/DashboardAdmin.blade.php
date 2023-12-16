<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        body {
            font-family: "Inter", sans-serif;
            font-weight: normal;
            font-style: normal;
            overflow-x: hidden;
            font-size: 15px;
            background-color: #F0F0F0;
            scroll-behavior: smooth;
        }

        .card-container {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            flex: 1;
            width: 18rem;
            margin: 10px;
        }

        .card-border-left {
            border-left: 4px solid #007bff;
        }

        .subtitle {
            font-size: 14px;
            color: #888;
        }

        .icon-button {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 20px;
            margin-right: 10px;
        }

        footer {
            margin-top: 100px;
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
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="navbar bg-dark fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-theme="dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="{{ route('actionLogout') }}" class="btn btn-danger me-3">Logout</a>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <div class="d-grid gap-2">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Semesta Group</h5>
                    <p class="subtitle">Event Organizer</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fas fa-home" style="margin-right: 5px;"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('managementEventAdmin') }}">
                            <i class="fas fa-folder" style="margin-right: 5px;"></i>
                            Management Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('managementUser') }}">
                            <i class="fas fa-user" style="margin-right: 5px;"></i>
                            Management User
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Data Master -->
        <div class="container">
            <div class="content-wrapper" style="margin-top: 80px;">
                <h1><strong>Admin Dashboard</strong></h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card card-border-left shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Income (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 20.000.000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card card-border-left shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            User Total</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card card-border-left shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Booking Total</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card card-border-left shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            New Order Booking</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-cart-plus fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    @foreach ($acara2 as $isi2)
                    <div class="card">
                        <img src="{{ $isi2['gambar'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $isi2['nama'] }}</h5>
                            <a href="{{ url('managementUser') }}" class="btn btn-link">User Order<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <br>

                <h1><strong>Order Status</strong></h1>
                <table class="table table-striped border-dark text-center">
                    <tr class="">
                        <th>No</th>
                        <th>Invoice Number</th>
                        <th>Nama</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                    @forelse ($admin as $item)
                    <tr>
                        <td>{{ $item['no'] }} </td>
                        <td>{{ $item['invoice'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>IDR {{ $item['price'] }}</td>
                        <td>{{ $item['status'] }}</td>
                        <td>
                            @if ($item['keterangan'] === 'lunas')
                            <i class="fas fa-check-circle text-success"></i>
                            @else
                            <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Kelas masih kosong
                    </div>
                    @endforelse
                </table>
            </div>
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
    <!-- /footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

</body>

</html>