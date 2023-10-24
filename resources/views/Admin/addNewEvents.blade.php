@extends('dashboardAdmin')
@section('content')

<style>
    .container-form {
        width: 1000px;
        height: 450px;
        border-radius: 5px;
        box-shadow: 2px 1px 10px rgba(128, 128, 128, 0.5);
        margin: 0 auto; 
        padding: 20px;
    }

    .container-isi {
        padding: 20px;
    }

    .button-add {
        text-align: right; 
    }
</style>

<div class="content">
    <div class="container-fluid mt-6">
        <h1 class="mb-4">Add New Events</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="container-form">
                        <div class="container-isi">
                            <h5 class="mb-4">New Event Details</h5>
                            <div class="mb-4 row">
                                <label for="formFile" class="col-sm-2 col-form-label">Add Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="eventName" class="col-sm-2 col-form-label">Event Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="eventName">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="button-add">
                                <a href="{{ url('admin') }}" class="btn btn-primary">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection