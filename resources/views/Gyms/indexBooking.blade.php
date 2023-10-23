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

    .checklist {
      list-style: none; /* Menghilangkan bullet point standar */
    }

    .checklist li {
      display: flex; /* Membuat poin-poin tampil dalam satu baris */
      align-items: center; /* Pusatkan tanda centang vertikal */
    }

    .checklist li::before {
      content: '\2713'; /* Menampilkan tanda centang Unicode */
      color: green; /* Warna tanda centang */
      margin-right: 5px; /* Jarak antara tanda centang dan teks */
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

</style>

<div class="card-container">
  @foreach ($booking as $isi)
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title"><strong>{{ $isi['nama'] }}</strong></h5>
        <h1 class="card-title"><strong>{{ $isi['harga'] }}</strong></h1>
        <a href="#" class="btn btn-primary">Booking</a>
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

@endsection
