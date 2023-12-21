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
                                    <img src="{{ asset('uploads/images/' . Auth::user()->image) }}" class="rounded-circle mb-3" style="width:100px;" alt="Avatar" />
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
                                <label for="inputname" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="inputname" value="{{auth()->user()->username}}" name="nama" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputNotel" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="inputNotel" value="{{auth()->user()->phone_number}}" name="phoneNumber" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" value="{{auth()->user()->email}}" name="email" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Detail Event Form -->
                <div class="card">
                    <div class="card-header">
                        <h6>2. Detail Event Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="tanggal_event">Tanggal Event:</label>
                                <input type="date" class="form-control" id="tanggal_event" value="" name="tanggal_event" required>
                            </div>
                            <div class="col-12">
                                <label for="tempat_event">Tempat Event:</label>
                                <input type="text" class="form-control" id="tempat_event" value="" name="tempat_event" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Pesanan Form -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h6>3. Payment Method</h6>
                    </div>
                    <br>
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
                                <br>
                                <div class="col-md-12">
                                    <label for="inputcardNumber" class="form-label">Card Number</label>
                                    <input type="number" class="form-control" id="inputcardNumber" name="card_number">
                                </div>
                                <br>
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
            <br>
            <!-- Card on the Right -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>4. Your Order</h6>
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
                                    <td>{{'IDR ' . number_format($event['harga'], 0, ',', '.')}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Total<strong></td>
                                    <td><strong>{{'IDR ' . number_format($event['harga'], 0, ',', '.')}}<strong></td>
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

    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Payment successful! Thank you for your order.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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

    <script>
        function liveAlertBtn(message) {
            return confirm(message);
        }

        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            const message = `Apakah Anda Yakin Dengan Pesanan Ini?\n\n! Pesanan yang sudah dibayar tidak dapat diubah !`;

            if (!liveAlertBtn(message)) {
                event.preventDefault();
            } else {
                var toast = new bootstrap.Toast(document.getElementById('successToast'), {
                    delay: 4000
                });
                toast.show();

                setTimeout(function() {
                    form.submit();
                }, 4000);
                form.submit();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cashOnDeliveryRadio = document.getElementById('flexRadioDefault1');
            var creditOrDebitRadio = document.getElementById('flexRadioDefault2');
            var detailPayment = document.getElementById('detail-payment');

            function toggleDetailPayment() {
                detailPayment.style.display = creditOrDebitRadio.checked ? 'block' : 'none';

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