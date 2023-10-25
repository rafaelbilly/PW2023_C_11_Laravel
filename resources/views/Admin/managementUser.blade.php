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
                                    <a href="#" class="btn">
                                        <i class="fas fa-pencil-alt pencil-icon"></i>
                                    </a>
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
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

@endsection