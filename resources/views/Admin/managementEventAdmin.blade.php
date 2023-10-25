@extends('dashboardAdmin')
@section('content')

<style>
    body {
        font-family: "Inter", sans-serif;
        background-color: #F0F0F0;
    }

    .section-title {
        font-weight: bold;
        margin: 0;
    }

    .button-group {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .button-group a {
        margin-left: 10px; 
    }

    .button-group a:first-child {
        margin-left: 0; 
    }

    .button-add {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px; 
    }

    .scroll-card {
        overflow-x: initial; 
        white-space: normal; 
    }

    .scroll-horizontal {
    overflow-x: auto;
    white-space: nowrap;
    }

    .scroll-horizontal::-webkit-scrollbar {
        width: 0; 
    }
 
    .scroll-horizontal::-webkit-scrollbar-thumb {
        background: transparent; 
    }

    .card-event {
        transition: transform 0.3s; 
    }

    .card-event:hover {
        transform: scale(1.1); 
    }

    a.read-more {
        text-decoration: underline;
        color: blue;
        cursor: pointer;
        font-size: 14px;
    }

    .card-description ul {
        list-style-position: inside;
        padding-left: 1rem; 
        margin-top: 5px; 
        margin-bottom: 5px; 
    }
</style>

<body style="background-color: #f0f0f0;">
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-3 mb-3 section-title">Management Events</h1>
            <div class="mb-3">
                <div class="col-2 d-flex">
                    <i class="fas fa-search"  style="font-size: 20px;"></i>
                    <input type="text" class="form-control" id="search" placeholder="Search" style="margin-left: 10px;">
                </div>
            </div>


            <div class="card text-bg-dark" style="height: 200px;">
                <img src="{{ asset('img/comingsoonPic.jpg') }}" class="card-img" alt="Coming Soon" style="object-fit: cover; width: 100%; height: 200px; opacity: 0.6;">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                    <h1 class="card-title text-center">Coming Soon</h1>
                    <p class="card-text text-center">There will be something special in the near future</p>
                </div>
            </div>

            <h1 class="mt-5 mb-3 section-title">Events</h1>
            <div class="scroll-horizontal" style="overflow-x: auto; white-space: nowrap;">
                <div class="d-flex flex-row flex-nowrap">
                    @foreach($event as $eventData)
                    <div class="col-md-3">
                        <div class="card-event card h-100 scroll-card" style="width: 18rem;">
                            <img src="{{ $eventData['gambarEvent'] }}" class="card-img-top" alt="{{ $eventData['judul'] }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $eventData['judul'] }}</strong></h5>
                                <div class="card-description">
                                    <p class="card-text" style="text-align: justify;">
                                        <small>{{ $eventData['deskripsi'] }}</small>
                                    </p>
                                    <p><h6><strong>What will you get?</strong></h6></p>
                                    <ul class="list-group deskripsi2-item" style="display: none;">
                                        @php
                                            $deskripsi2Items = explode("\n", $eventData['deskripsi2']);
                                        @endphp
                                        @foreach($deskripsi2Items as $item)
                                            <small><li>{{ $item }}</li></small>
                                        @endforeach
                                    </ul>
                                    <a href="javascript:void(0);" class="read-more" onclick="toggleDeskripsi2(this)">Read more</a>
                                </div>
                            </div>
                            <div class="card-footer button-group">
                                <a href="{{ url('admin3') }}" class="btn">
                                    <i class="fas fa-pencil-alt pencil-icon"></i>
                                </a>
                                <a href="#" class="btn">
                                    <i class="fas fa-trash-alt trash-can"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="button-add">
                <a href="{{ url('admin3') }}" class="btn btn-primary">Add New Events</a>
            </div>

    <script>
        function toggleDeskripsi2(btn) {
            var listItem = btn.parentElement;
            var deskripsi2Item = listItem.querySelector('.deskripsi2-item');

            if (deskripsi2Item.style.display === "none") {
                deskripsi2Item.style.display = "block";
                btn.innerHTML = "Read less";
            } else {
                deskripsi2Item.style.display = "none";
                btn.innerHTML = "Read more";
            }
        }
    </script>
</body>

@endsection