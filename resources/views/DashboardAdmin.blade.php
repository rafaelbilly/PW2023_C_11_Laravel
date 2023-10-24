<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>UTS_PW</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <style>
            .subtitle {
                font-size: 14px;
                color: #888;
            }
            .icon-button {
                background: none;
                border: none;
                color: #888;
                cursor: pointer;
                font-size: 20px;
                margin-right: 10px; 
            }
        </style>
        
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="d-grid gap-2">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Semesta Group</h5>
                        <p class="subtitle">Event Organizer</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <center>
                        <div>
                            <img src="{{ asset('img/Fotokosong.jpeg') }}" class="img-fluid rounded-circle" style="width: 30px; height: 30px; margin-right: 10px;" alt="Profile Picture">
                            <button class="icon-button"><i class="fas fa-cog"></i></button>
                            <button class="icon-button"><i class="fas fa-bell"></i></button>
                        </div>
                    </center>

                    <form class="d-flex mt-3" role="search">
                    <button type="submit" class="btn">
                        <i class="fas fa-search" style="margin-right: 5px;"></i> 
                    </button>
                        <input class="form-control me-2" type="search" placeholder="Search for ..." aria-label="Search">
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fas fa-home" style="margin-right: 5px;"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin') }}">
                                <i class="fas fa-folder" style="margin-right: 5px;"></i>
                                Management Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin2') }}">
                                <i class="fas fa-user" style="margin-right: 5px;"></i>
                                Management User
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            
            <div class="content-wrapper" style="margin-top: 80px;">
                @yield('content')
            </div>
            
        </div>

        
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/adminlte.min.js') }}"></script>

    </body>
</html>
