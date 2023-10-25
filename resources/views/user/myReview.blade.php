<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Review</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            font-size: 15px;
            background-color: #F0F0F0;
        }

        .navbar {
            position: fixed;
            width: 100%;
            height: 80px;
        }

        p {
            margin: 0;
            padding: 0;
            font-size: 15px;
            line-height: 24px;
        }

        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 90px;
            padding-bottom: 3px;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #303030;
            min-height: 100px;
            color: #fff;
            font-size: 16px;
            font-weight: 400;
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
            <a class="navbar-brand" href="{{ url('dashboard') }}"><strong>SemestaGroup</strong></a>
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
                        <a class="nav-link" href="{{ url('booking') }}">Booking</a>
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
                            <li><a class="dropdown-item" href="{{ url('landing') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- My Review -->
    <div class="profile-container">
        <div class="container light-style flex-grow-1 container-p-y">
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="{{ url('userProfile') }}">User Profile</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="{{ url('myBooking') }}">My Booking</a>
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#">My Review</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <div class="media-body ml-4">
                                        <div class="card" style="width: 18rem;">
                                            <img src="https://i.pinimg.com/564x/2a/cb/88/2acb882e7646978972e1871c8ef9f64f.jpg" class="card-img-top" alt="...">
                                            <div class="card-body media align-items-center">
                                                <h5 class="card-title text-center">Wedding Ceremony</h5>
                                                <p class="card-text text-center">Terima kasih Semesta Group atas dukungan teknis dan layanan produksi yang luar biasa. Pencahayaan, sistem suara, dan panggung yang mereka sediakan sangat mengesankan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="col-lg-8">
                <p>SemestaGroup @ 2023. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- /footer -->
    <script>
        function addReviewModal() {
            $('#reviewModal').modal('show');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>