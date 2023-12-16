<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>

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

        .subtitle {
            font-size: 14px;
            color: #888;
        }

        .icon-button {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
        }

        .section-title {
            font-weight: bold;
            margin: 0;
        }

        .icon-button {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .table {
            width: 97%;
            margin: 0;
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
                        <a class="nav-link" href="{{ url('managementEventAdmin') }}">
                            <i class="fas fa-folder" style="margin-right: 5px;"></i>
                            Management Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-user" style="margin-right: 5px;"></i>
                            Management User
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- User Management -->
        <div class="container">
            <div class="content-wrapper" style="margin-top: 80px;">
                <div class="container-fluid">
                    <h1 class="mb-3 section-title">Management User</h1>
                    <div class="mb-5">
                        <div class="col-2 d-flex">
                            <i class="fas fa-search" style="font-size: 20px;"></i>
                            <input type="text" class="form-control" id="search" placeholder="Search" style="margin-left: 10px;">
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="table mb-5">
                            <tr class="table-secondary">
                                <th>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </th>
                                <th>Name</th>
                                <th>Invoice Number</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($users as $key => $user)
                            <tr>
                                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('images/Fotokosong.jpeg') }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px;" alt="Profile Picture">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-title">{{ $user['name'] }}</h5>
                                            <p class="card-text">{{ $user['work'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user['invoiceNumber'] }}</td>
                                <td>{{ $user['phoneNumber'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['status'] }}</td>
                                <td>
                                    <div class="button-group">
                                        <span class="badge rounded-pill text-bg-light">
                                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal{{ $key }}">
                                                <i class="fas fa-pencil-alt pencil-icon"></i>
                                            </a>
                                            <div class="modal fade" id="modal{{ $key }}" tabindex="-1" aria-labelledby="modalTitle{{ $key }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalTitle{{ $key }}">Details User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: left;">
                                                            <div class="row g-0">
                                                                <div class="col-md-4">
                                                                    <img src="{{ asset('images/Fotokosong.jpeg') }}" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt="Profile Picture">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <form>
                                                                        <div class="mb-3">
                                                                            <label for="nameInput" class="form-label">Name</label>
                                                                            <input type="text" class="form-control" id="nameInput" placeholder="{{ $user['name'] }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="invoiceInput" class="form-label">Invoice Number</label>
                                                                            <input type="text" class="form-control" id="invoiceInput" placeholder="{{ $user['invoiceNumber'] }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="phoneInput" class="form-label">Phone Number</label>
                                                                            <input type="text" class="form-control" id="phoneInput" placeholder="{{ $user['phoneNumber'] }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="emailInput" class="form-label">Email</label>
                                                                            <input type="email" class="form-control" id="emailInput" placeholder="{{ $user['email'] }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="statusInput" class="form-label">Status</label>
                                                                            <input type="text" class="form-control" id="statusInput" placeholder="{{ $user['status'] }}">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ url('managementUser') }}" class="btn btn-primary">Save Changes</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <a href="#" class="btn">
                                                <i class="fas fa-trash-alt trash-can"></i>
                                            </a>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">11</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>