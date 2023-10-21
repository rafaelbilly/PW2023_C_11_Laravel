@extends('dashboard')
@section('content')

<style>
  .btn-link {
    text-decoration: none;
  }

  .card-container {
    margin-top: 120px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .card {
    flex: 1;
    width: 18rem; 
    margin: 10px;
  }

  .center-button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; /* Adjust the margin to your preference */
  }
</style>

<div class="card-container">
  @foreach ($acara as $isi)
    <div class="card">
      <img src="{{ $isi['gambar'] }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $isi['nama'] }}</h5>
        <p class="card-text">{{ $isi['deskripsi'] }}</p>
        <a href="#" class="btn btn-link">More Info <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  @endforeach
</div>

<div class="center-button">
  <a href="{{ url('indexBooking') }}" class="btn btn-primary">Booking Now</a>
</div>

@endsection
