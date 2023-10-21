@extends('dashboardAdmin')
@section('content')

<style>
    .containerGambar {
        position: relative;
        width: 1200px; 
        height: 200px;
        background-color: black;
        border-radius: 5px;
    }

    .comingsoon {
        width: 1200px;
        height: 200px;
        object-fit: cover;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 5px;
    }

    .black-opacity {
        opacity: 0.5; 
        transition: opacity 0.3s;
    }
    
    .comingsoon-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white; 
        font-size: 30px;
        z-index: 2; 
    }

    .card {
        
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        margin: 10px;
        overflow: hidden;
    
    }

    .card-description {
        flex-grow: 1;
        white-space: normal;
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

    .scroll-horizontal {
        overflow-x: scroll;
        white-space: nowrap;
    }

    .scroll-horizontal::-webkit-scrollbar {
        height: 0;
        display: none;
    }

    .row {
        display: inline-block;
    }

    .col-md-4 {
        display: inline-block;
        margin-right: 5px; 
    }

</style>

<div class="content">
    <div class="container-fluid">
        <h1 class="mt-3 mb-3">Management Events</h1>
        <div class="containerGambar">
            <img class="comingsoon black-opacity" src="{{ asset('img/comingsoonPic.jpg') }}" alt="">
            <h1 class="comingsoon-text">Coming Soon</h1>
    </div>

        <h1 class="mt-5 mb-3">Events</h1>
        <div class="scroll-horizontal">
            <div class="row">
                @foreach($event as $eventData)
                <div class="col-md-4">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="{{ $eventData['gambarEvent'] }}" class="card-img-top" alt="{{ $eventData['judul'] }}">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $eventData['judul'] }}</strong></h5>
                            <div class="card-description">
                                <p class="card-text" style="text-align: justify;"><small>{{ $eventData['deskripsi'] }}</small></p>
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
    </div>
</div>

@endsection