@extends('dashboard2')
@section('content')

<style>
    .card-container {
        margin-top: 30px;
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

<h1><strong>Dashboard</strong></h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
            <div class="card p-2 mx-2" style="width: 200px; height: 80px">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <div class="mt-0">
                            <p class="m-0">Users Total</p>
                            <p><strong>11.8M</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card p-2 mx-2" style="width: 200px; height: 80px">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <div class="mt-0">
                            <p class="m-0">New Users</p>
                            <p><strong>8.236K</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card p-2 mx-2" style="width: 200px; height: 80px">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <div class="mt-0">
                            <p class="m-0">Active Users</p>
                            <p><strong>2.352M</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card p-2 mx-2" style="width: 200px; height: 80px">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <div class="mt-0">
                            <p class="m-0">New Users Active</p>
                            <p><strong>6K</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
</div>

<div class="card-container">
            @foreach ($acara2 as $isi2)
                <div class="card">
                <img src="{{ $isi2['gambar'] }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $isi2['nama'] }}</h5>
                    <a href="#" class="btn btn-link">User Order<i class="fas fa-arrow-right"></i></a>
                </div>
                </div>
            @endforeach
        </div>

<h1><strong>Order Status</strong></h1>
    <table class="table table-striped border-dark text-center">
        <tr class="">
            <th>No</th>
            <th>Invoice Number</th>
            <th>Nama</th>
            <th>Price</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
        @forelse ($admin as $item)
            <tr>
                <td>{{ $item['no'] }} </td>
                <td>{{ $item['invoice'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>IDR {{ $item['price'] }}</td>
                <td>{{ $item['status'] }}</td>
                <td>
                    @if ($item['keterangan'] === 'lunas')
                        <i class="fas fa-check-circle text-success"></i>
                    @else
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                </td>
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Kelas masih kosong
            </div>
        @endforelse
    </table>

    

@endsection