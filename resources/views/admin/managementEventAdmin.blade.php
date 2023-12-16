<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>

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
        }

        .section-title {
            font-weight: bold;
            margin: 0;
        }

        .button-group {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .button-group a {
            margin-left: 10px;
        }

        .button-group a:first-child {
            margin-left: 0;
        }

        .button-add {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }

        .scroll-card {
            overflow-x: initial;
            white-space: normal;
        }

        .scroll-horizontal {
            overflow-x: auto;
            white-space: nowrap;
        }

        .scroll-horizontal::-webkit-scrollbar {
            width: 0;
        }

        .scroll-horizontal::-webkit-scrollbar-thumb {
            background: transparent;
        }

        .card-event {
            transition: transform 0.3s;
            transform-origin: center top;
            width: 12rem;
            height: 60%;
        }

        a.read-more {
            text-decoration: underline;
            color: blue;
            cursor: pointer;
            font-size: 14px;
        }

        .card-description ul {
            list-style-position: inside;
            padding-left: 1rem;
            margin-top: 5px;
            margin-bottom: 5px;
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
                        <a class="nav-link" aria-current="page" href="{{ url('DashboardAdmin') }}">
                            <i class="fas fa-home" style="margin-right: 5px;"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('managementEventAdmin') }}">
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

        <!-- Content -->
        <div class="container">
            <div class="content-wrapper" style="margin-top: 80px;">
                <div class="container-fluid">
                    <h1 class="mt-3 mb-3 section-title">Management Events</h1>
                    <div class="mb-3">
                        <div class="col-2 d-flex">
                            <i class="fas fa-search" style="font-size: 20px;"></i>
                            <input type="text" class="form-control" id="search" placeholder="Search" style="margin-left: 10px;">
                        </div>
                    </div>


                    <div class="card text-bg-dark" style="height: 200px;">
                        <img src="{{ asset('images/comingsoonPic.jpg') }}" class="card-img" alt="Coming Soon" style="object-fit: cover; width: 100%; height: 200px; opacity: 0.6;">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <h1 class="card-title text-center">Coming Soon</h1>
                            <p class="card-text text-center">There will be something special in the near future</p>
                        </div>
                    </div>


                    <div class="container-fluid">
                        <h1 class="mt-5 mb-3 section-title">Events</h1>
                        <div class="scroll-horizontal" style="overflow-x: auto; white-space: nowrap;">
                            <div class="d-flex flex-row flex-nowrap">
                                @foreach($event as $eventData)
                                <div class="col-md-3">
                                    <div class="card-event card h-100 scroll-card" style="width: 18rem;">
                                        <img src="{{ $eventData['gambarEvent'] }}" class="card-img-top" alt="{{ $eventData['judul'] }}">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{ $eventData['judul'] }}</strong></h5>
                                            <div class="card-description">
                                                <p class="card-text" style="text-align: justify;">
                                                    <small>{{ $eventData['deskripsi'] }}</small>
                                                </p>
                                                <p>
                                                <h6><strong>What will you get?</strong></h6>
                                                </p>
                                                <ul class="list-group deskripsi2-item" style="display: none;">
                                                    @php
                                                    $deskripsi2Items = explode("\n", $eventData['deskripsi2']);
                                                    @endphp
                                                    @foreach($deskripsi2Items as $item)
                                                    <small>
                                                        <li>{{ $item }}</li>
                                                    </small>
                                                    @endforeach
                                                </ul>
                                                <a href="javascript:void(0);" class="read-more" onclick="toggleDeskripsi2(this)">Read more</a>
                                            </div>
                                        </div>
                                        <div class="card-footer button-group">
                                            <a href="{{ url('managementEventAdmin') }}" class="btn">
                                                <i class="fas fa-pencil-alt pencil-icon"></i>
                                            </a>
                                            <a href="#" class="btn">
                                                <i class="fas fa-trash-alt trash-can"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="button-add">
                        <a href="{{ url('addNewEvents') }}" class="btn btn-primary">Add New Events</a>
                    </div>
                </div>
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

    <script>
        function toggleDeskripsi2(btn) {
            var listItem = btn.parentElement;
            var deskripsi2Item = listItem.querySelector('.deskripsi2-item');

            if (deskripsi2Item.style.display === "none") {
                deskripsi2Item.style.display = "block";
                btn.innerHTML = "Read less";
            } else {
                deskripsi2Item.style.display = "none";
                btn.innerHTML = "Read more";
            }
        }
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>