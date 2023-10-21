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
  }
</style>

<div class="card-container">
  @foreach ($booking as $isi)
    <div class="card">
      <div class="card-body text-center">
        <h6 class="card-title"><strong>{{ $isi['nama'] }}</strong></h6>
        <h1 class="card-title"><strong>{{ $isi['harga'] }}</strong></h1>
        <a href="#" class="btn btn-primary">Booking</a>
        <p class="card-text">{{ $isi['deskripsi'] }}</p>
      </div>
    </div>
  @endforeach
</div>

@endsection
