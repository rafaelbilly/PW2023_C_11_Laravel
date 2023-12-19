<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-ixon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                </ul>
            </div>
        </div>
    </nav>

    <!-- Checkout -->
    <div class="container" style="flex: 1;">
        <h1 style="margin-top: 100px"><strong>Checkout</strong></h1>

        <form class="row" style="margin-top: 30px;" method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input type="hidden" name="invoice" value="{{ $newInvoice }}">

            <div class="col-md-6">
                <!-- Personal Information Form -->
                <div class="card">
                    <div class="card-header">
                        <h6>1. Personal Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="inputname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputname" value="{{auth()->user()->username}}" name="nama">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNotel" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="inputNotel" value="{{auth()->user()->phoneNumber}}" name="phoneNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" value="{{auth()->user()->email}}" name="email">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Pesanan Form -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h6>2. Payment Method</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_type" id="flexRadioDefault1" value="cod">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_type" id="flexRadioDefault2" checked value="card">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Credit or Debit
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="detail-payment">
                                <div class="col-12">
                                    <label for="inputcardname" class="form-label">Cardholder Name</label>
                                    <input type="text" class="form-control" id="inputcardname" name="cardholder_name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputcardNumber" class="form-label">Card Number</label>
                                    <input type="number" class="form-control" id="inputcardNumber" name="card_number">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputexp" class="form-label">Exp date</label>
                                        <input type="date" class="form-control" id="inputexp" name="card_exp">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputcvc" class="form-label">CVC</label>
                                        <input type="text" class="form-control" id="inputcvc" name="card_cvc">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <p class="card-text"><small><strong>Invoice : </strong>{{$newInvoice}}</small></p>
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
                                    <td>{{$event->nama}}</td>
                                    <td>IDR {{$event->harga}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Total<strong></td>
                                    <td><strong>IDR {{$event->harga}}<strong></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" id="liveAlertPlaceholder" style="text-align: center;">
                        <button type="submit" class="btn btn-primary" id="liveAlertBtn" style="width: 100%;">Pay</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>SemestaGroup @ 2023. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function showAlert() {
            var message = 'Your Order Success Submit!';
            var type = 'success';
            alert(message, type);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cashOnDeliveryRadio = document.getElementById('flexRadioDefault1');
            var creditOrDebitRadio = document.getElementById('flexRadioDefault2');
            var detailPayment = document.getElementById('detail-payment');

            function toggleDetailPayment() {
                detailPayment.style.display = creditOrDebitRadio.checked ? 'block' : 'none';

                // Setiap kali terjadi perubahan, atur properti required untuk input Card
                var cardInputs = detailPayment.querySelectorAll('[name^="card"]');
                cardInputs.forEach(function(input) {
                    input.required = creditOrDebitRadio.checked;
                });
            }

            cashOnDeliveryRadio.addEventListener('change', toggleDetailPayment);
            creditOrDebitRadio.addEventListener('change', toggleDetailPayment);

            toggleDetailPayment();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>