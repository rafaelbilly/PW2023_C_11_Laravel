@extends('dashboard')
@section('content')

<style>
  .card-container {
      margin-top: 150px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .card {
      flex: 1;
      width: 18rem; 
      margin: 10px;
      transition: transform 0.3s; 
    }

    .card:hover {
        transform: scale(1.1); 
    }

    .checklist {
      list-style: none; 
    }

    .checklist li {
      display: flex; 
      align-items: center; 
    }

    .checklist li::before {
      content: '\2713'; 
      color: green; 
      margin-right: 5px; 
    }

    .card-body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card-body h6 {
      margin-top: 15px; 
    }

    .btn-primary {
      margin-top: 10px; 
    }
</style>

<body style="background-color: #F0F0F0">

  <div class="card-container">
    @foreach ($booking as $isi)
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title"><strong>{{ $isi['nama'] }}</strong></h5>
          <h1 class="card-title"><strong>{{ $isi['harga'] }}</strong></h1>
          <a href="{{ url('indexCheckout') }}" class="btn btn-primary">Booking</a>
          <h6 class="card-title" style="margin-top: 30px;">Includes:</h6>
          <ul class="checklist">
            @foreach (explode("\n", $isi['deskripsi']) as $point)
              <li>{{ $point }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endforeach
  </div>

</body>
@endsection
