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
    transition: transform 0.3s; 
    
  }

  .center-button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; 
  }

  .card:hover {
      transform: scale(1.1); 
   }

.more {
    display: none; /* Tambahkan ini */
  }
</style>

<body style="background-color: #F0F0F0">

<div class="card-container">
  @foreach ($acara as $isi)
    <div class="card">
      <img src="{{ $isi['gambar'] }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $isi['nama'] }}</h5>
        <p>{{ $isi['deskripsi'] }}<span class="dots">...</span></p>
        <h6>What will you get?</h6>
        <ul class="more"> 
          @foreach (explode("\n", $isi['deskripsi2']) as $point)
            <li>{{ $point }}</li>
          @endforeach
        </ul>
        <button onclick="myFunction(this)" class="btn btn-link">Read more</button>
      </div>
    </div>
  @endforeach
</div>

<div class="center-button">
  <a href="{{ url('indexBooking') }}" class="btn btn-primary">Booking Now</a>
</div>

<script>
function myFunction(btn) {
  var card = btn.closest('.card');
  var dots = card.querySelector('.dots');
  var moreList = card.querySelector('.more');
  var btnText = btn;

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreList.style.display = "none"; // Ubah menjadi none
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreList.style.display = "block"; // Ubah menjadi block
  }
}
</script>


</body>

@endsection
