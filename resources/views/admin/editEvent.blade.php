<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
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
            padding-top: 100px;
        }

        .container-form {
            width: 1000px;
            height: 550px;
            border-radius: 5px;
            box-shadow: 2px 1px 10px rgba(128, 128, 128, 0.5);
            margin: 0 auto;
            padding: 20px;
        }

        .container-isi {
            padding: 20px;
        }

        .button-add {
            text-align: right;
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

<body body class="hold-transition sidebar-mini">
    <!-- Sidebar -->
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

        <div class="container-fluid mt-6">
            <h1 class="mb-4">Edit Events</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container-form">
                            <div class="container-isi">
                                <h5 class="mb-4">New Event Details</h5>
                                <form action="{{ route('managementEventAdmin.update', $event->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4 row">
                                        <label for="formFile" class="col-sm-2 col-form-label">Edit Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile" name="image">
                                        </div>
                                        <div class="text-danger text-small">(dont upload new image if wont change old image)</div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="eventName" class="col-sm-2 col-form-label">Event Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="eventName" required name="nama" value="{{old('nama', $event->nama)}}">
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="price" required name="harga" value="{{old('harga', $event->harga)}}">
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="deskripsi">{{old('deskripsi', $event->deskripsi)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="description" class="col-sm-2 col-form-label">Item Detail (description 2)</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="deskripsi2" placeholder="separate with a new line">{{old('deskripsi', $event->deskripsi)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="button-add">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
        function showAlert() {
            var message = 'Success Add New Event to Dashboard!';
            var type = 'success';
            alert(message, type);
        }

        // @if (Session::has('success'))
        //     alert("{{ session('success') }}");
        // @elseif (Session::has('error'))
        //     alert("{{ session('error') }}");
        // @elseif (Session::has('info'))
        //     alert("{{ session('info') }}");
        // @endif;
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
