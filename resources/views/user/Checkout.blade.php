<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: "Inter", sans-serif;
            font-weight: normal;
            font-style: normal;
            overflow-x: hidden;
            font-size: 15px;
            background-color: #F0F0F0;
        }


        .navbar {
            position: fixed;
            width: 100%;
            height: 80px;
            background-color: #F0F0F0;
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
                            <li><a class="dropdown-item" href="{{ url('userProfile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('landing') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Checkout -->
    <div class="container">
        <h1 style="margin-top: 100px"><strong>Checkout</strong></h1>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6">
                <!-- Personal Information Form -->
                <div class="card">
                    <div class="card-header">
                        <h6>1. Personal Information</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-12">
                                <label for="inputname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputname">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNotel" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="inputNotel">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Detail Pesanan Form -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h6>2. Payment Method</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Credit or Debit
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputcardname" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" id="inputcardname">
                            </div>
                            <div class="col-md-12">
                                <label for="inputcardNumber" class="form-label">Card Number</label>
                                <input type="number" class="form-control" id="inputcardNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="inputexp" class="form-label">Exp date</label>
                                <input type="date" class="form-control" id="inputexp">
                            </div>
                            <div class="col-md-6">
                                <label for="inputcvc" class="form-label">CVC</label>
                                <input type="text" class="form-control" id="inputcvc">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card on the Right -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>3. Your Order</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <p class="card-text"><small><strong>Invoice : </strong>smgr-297318382</small></p>
                        <p class="card-text"><strong>Pesanan</strong></p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Event</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Engagement</td>
                                    <td>IDR 20.000.000</td>
                                </tr>

                                <tr>
                                    <td>Wedding Party</td>
                                    <td>IDR 40.000.000</td>
                                </tr>

                                <tr>
                                    <td><strong>Total<strong></td>
                                    <td><strong>IDR 60.000.000<strong></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" id="liveAlertPlaceholder" style="text-align: center;">
                        <button type="button" class="btn btn-primary" id="liveAlertBtn" style="width: 100%;" onclick="showAlert()">Pay</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showAlert() {
                var message = 'Your Order Success Submit!';
                var type = 'success';
                alert(message, type);
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>