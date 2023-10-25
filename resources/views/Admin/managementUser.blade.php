@extends('dashboardAdmin')
@section('content')

<head>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #F0F0F0;
        }

        .section-title {
            font-weight: bold;
            margin: 0;
        }

        .icon-button {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .table {
            width: 97%;
            margin: 0;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
    <div class="content">
        <div class="container-fluid">
            <h1 class="mb-3 section-title">Management User</h1>
            <div class="mb-5">
                <div class="col-2 d-flex">
                    <i class="fas fa-search"  style="font-size: 20px;"></i>
                    <input type="text" class="form-control" id="search" placeholder="Search" style="margin-left: 10px;">
                </div>
            </div>

            <div class="table-container">
                <table class="table mb-5">
                    <tr class="table-secondary">
                        <th>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th>Name</th>
                        <th>Invoice Number</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($users as $key => $user)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('img/Fotokosong.jpeg') }}" class="img-fluid rounded-circle"
                                        style="width: 50px; height: 50px;" alt="Profile Picture">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $user['name'] }}</h5>
                                    <p class="card-text">{{ $user['work'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user['invoiceNumber'] }}</td>
                        <td>{{ $user['phoneNumber'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['status'] }}</td>
                        <td>
                            <div class="button-group">
                                <span class="badge rounded-pill text-bg-light">
                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal{{ $key }}">
                                        <i class="fas fa-pencil-alt pencil-icon"></i>
                                    </a>
                                    <div class="modal fade" id="modal{{ $key }}" tabindex="-1" aria-labelledby="modalTitle{{ $key }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalTitle{{ $key }}">Details User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="text-align: left;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="{{ asset('img/Fotokosong.jpeg') }}" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt="Profile Picture">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="nameInput" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="nameInput" placeholder="{{ $user['name'] }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="invoiceInput" class="form-label">Invoice Number</label>
                                                                    <input type="text" class="form-control" id="invoiceInput" placeholder="{{ $user['invoiceNumber'] }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phoneInput" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phoneInput" placeholder="{{ $user['phoneNumber'] }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="emailInput" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="emailInput" placeholder="{{ $user['email'] }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="statusInput" class="form-label">Status</label>
                                                                    <input type="text" class="form-control" id="statusInput" placeholder="{{ $user['status'] }}">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('admin2') }}" class="btn btn-primary">Save Changes</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="btn">
                                        <i class="fas fa-trash-alt trash-can"></i>
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">11</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

@endsection