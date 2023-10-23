@extends('dashboard')
@section('content')

<style>
  .card {
    width: 80%;
    margin: auto;
    text-align: center;
    margin-top: 40px;
    border: none;
  }

  .card-img-top {
    width: 80%;
    display: block;
    margin: 0 auto;
  }

  .button-container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    margin-top: 90px; 
    border-bottom: 1px solid #000; 
    padding-bottom: 3px; 
  }

  .button-container a {
    margin: 5px;
    text-decoration: none;
    color: black;
  }
</style>

<div class="button-container">
  <a href="#" class="btn btn-link btn-lg">User Profile</a>
  <a href="{{ url('myBooking') }}" class="btn btn-link btn-lg">My Booking</a>
</div>

<div class="card">
  <img src="{{$gambar}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$namaAcara}}</h5>
    <p class="card-text">{{$tanggal}}</p>
    <a href="#" class="btn btn-danger">Delete</a>
  </div>
</div>

@endsection
