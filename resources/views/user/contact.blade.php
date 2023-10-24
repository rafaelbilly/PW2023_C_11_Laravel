@extends('user/dashboard')
@section('content')

<div class="row featurette d-flex align-items-center" style="margin-top: 100px;">
    <div class="col-md-5" style="margin-bottom: 20px;">
        <img src="{{ asset('images/EO2.jpeg') }}"
        class="featurette-image img-fluid mx-auto rounded shadow"
        role="img" aria-label="Gambar featurette 1" focusable="false" style="max-width: 100%; height: auto; width: 100%;" />
    </div>
    <div class="col-md-7">
        <h2 class="featurette-heading fw-normal">
            <strong>Let's Set Up Your Dream Event With Us!</strong>
        </h2>
        <h2 class="featurette-heading fw-normal">
            <strong>Schedule A Free Consultation</strong>
        </h2>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <h5 class="card-title" style="font-size: 16px;"><i class="fa fa-phone"></i> Phone Number</h5>
                <p class="card-text" style="font-size: 14px;">081234567890</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <h5 class="card-title" style="font-size: 16px;"><i class="fab fa-instagram"></i> Instagram</h5>
                <p class="card-text" style="font-size: 14px;">@semesta_eo</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <h5 class="card-title" style="font-size: 16px;"><i class="fa fa-map-marker"></i> Address</h5>
                <p class="card-text" style="font-size: 14px;">Jl. Babarsari No.44, Kec. Depok, Kabupaten Sleman</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <h5 class="card-title" style="font-size: 16px;"><i class="fa fa-envelope"></i> Email</h5>
                <p class="card-text" style="font-size: 14px;">semesta_group@gmail.com</p>
            </div>
        </div>
    </div>
</div>


@endsection
