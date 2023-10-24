@extends('dashboard')
@section('content')

<h1 style="margin-top: 70px"><strong>Checkout</strong></h1>

<div class="row" style="margin-top: 40px;">
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
            <button type="button" class="btn btn-primary" id="liveAlertBtn" style="width: 100%;">Pay</button>
        </div>
    </div>
</div>


<script>
    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
    var wrapper = document.createElement('div')
    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

    alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
    alertTrigger.addEventListener('click', function () {
        alert('Nice, you triggered this alert message!', 'success')
    })
    }
</script>

@endsection
