<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semesta Group</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            font-weight: normal;
            font-style: normal;
            overflow-x: hidden;
            font-size: 15px;
            background-color: #F0F0F0;
        }

        p {
            margin: 0;
            padding: 0;
            font-size: 15px;
            line-height: 24px;
        }

        .midline {
            width: 150px;
            border-top: 3px solid #ae9326;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background-color: transparent;
            transition: background-color 0.5s ease-in-out;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .navbar.scroll {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-area {
            position: relative;
            padding: 150px 0 120px 0;
            background: #303030;
            height: 100vh;
        }

        .hero-area .carousel-inner img {
            height: 500px;
        }

        .hero-area .hero-content {
            border-radius: 0;
            position: relative;
            z-index: 1;
            text-align: left;
        }

        .hero-area .hero-content h1 {
            font-size: 45px;
            font-weight: 800;
            line-height: 50px;
            color: #fff;
            text-shadow: 0px 3px 8px #00000017;
            text-transform: capitalize;
        }

        .hero-area .hero-content h1 span {
            display: block;
        }

        .hero-area .hero-content p {
            margin-top: 30px;
            font-size: 20px;
            color: #fff;
        }

        .about {
            padding: 70px 0;
        }

        .about img {
            width: 100%;
            height: auto;
        }

        .about h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .what-we-do {
            padding: 50px 0;
        }

        .what-we-do-item {
            text-align: center;
            padding: 20px;
        }

        .what-we-do-item i {
            font-size: 3em;
            color: #000;
        }

        .what-we-do-item h3 {
            font-size: 2em;
            margin-top: 0;
        }

        .what-we-do-item p {
            font-size: 1.5em;
        }

        .team {
            height: 500px;
        }

        .team .card-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .team .card-img-top {
            height: 300px;
        }

        .team .card:hover {
            transform: scale(1.1);
            transition: transform 0.5s;
        }

        .social-media {
            margin-top: 20px;
            text-align: center;
        }

        .social-media a {
            color: #000;
            font-size: 20px;
            margin: 0 10px;
        }

        .social-media a:hover {
            color: #333;
        }

        .partnership {
            height: 300px;
            padding: 12px 0;
            text-align: center;
        }

        .partnership img {
            max-width: 50%;
            transition: all 0.4s ease-in-out;
            display: inline-block;
            padding: 15px 0;
            filter: grayscale(100);
        }

        .partnership img:hover {
            filter: none;
            transform: scale(1.1);
        }

        .clients {
            margin-top: 120px;
            height: 600px;
        }

        .clients .card-img-top {
            max-height: 250px;
            object-fit: cover;
        }

        .card .profile-details {
            display: flex;
            align-items: center;
            column-gap: 12px;
            padding: 15px;
        }

        .card .profile-details img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .profile-details .name {
            font-size: 15px;
            font-weight: 500;
        }

        .profile-details .name-event {
            font-size: 12px;
            font-weight: 500;
            color: #4d4d4d;
        }

        .clients .card:hover {
            transform: scale(1.1);
            transition: transform 0.5s;
        }

        footer.footer-no-gap {
            margin-top: 0px;
        }

        footer {
            margin-top: 100px;
            background-color: #303030;
            min-height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        footer p {
            text-align: left;
            line-height: 100px;
            color: #fff;
            font-size: 16px;
            font-weight: 400;
        }

        footer p a {
            color: #fff;
            transition: all .3s;
            position: relative;
            z-index: 3;
        }

        footer p a:hover {
            opacity: 0.75;
        }

        .scroll-top {
            width: 45px;
            height: 45px;
            line-height: 45px;
            background: #303030;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: #fff !important;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9;
            cursor: pointer;
            -webkit-transition: all .3s ease-out 0s;
            transition: all .3s ease-out 0s;
            border-radius: 5px;
        }

        .scroll-top:hover {
            -webkit-box-shadow: 0 1rem 3rem rgba(35, 38, 45, 0.15) !important;
            box-shadow: 0 1rem 3rem rgba(35, 38, 45, 0.15) !important;
            -webkit-transform: translate3d(0, -5px, 0);
            transform: translate3d(0, -5px, 0);
            background-color: #081828;
        }

        @media (max-width: 991px) {
            .navbar {
                padding: 10px;
            }

            .hero-area {
                padding: 100px 0;
            }

            .hero-area .carousel-inner img {
                height: auto;
            }
        }

        @media (max-width: 767px) {
            .navbar {
                padding: 10px;
            }

            .hero-area {
                padding: 80px 0;
            }

            .hero-area .hero-content h1 {
                font-size: 30px;
                line-height: 35px;
            }

            .what-we-do-item {
                text-align: left;
            }

            .team .card-group {
                flex-direction: column;
            }

            .team .card-img-top {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>SemestaGroup</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('service') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('booking') }}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav fs-5 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" arialabelledby="userDropdown">
                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width:100px;" alt="Avatar" />
                                <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div>
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('actionLogout') }}"><i class="fa fa-user"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Hero -->
    <section id="home" class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h1>The Biggest Event Organizer in Indonesia</h1>
                        <p>We are experts in creating unforgettable moments.</p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="carousel slide" id="hero-carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('/images/carousel-1.jpg') }}" class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/carousel-2.jpg') }}" class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/carousel-3.jpg') }}" class="d-block w-100" alt="Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/carousel-4.jpg') }}" class="d-block w-100" alt="Slide 4">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/carousel-5.jpg') }}" class="d-block w-100" alt="Slide 5">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/carousel-6.jpg') }}" class="d-block w-100" alt="Slide 6">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero -->

    <!-- About -->
    <section class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/team.jpg') }}" alt="about">
                </div>
                <div class="col-md-6">
                    <h1 style="text-align: center;"><strong>ABOUT US</strong></h1>
                    <hr class="midline">
                    <br>
                    <p>Semesta Group is an event organizer and technical event production. Our services includes event planning and production, design and decoration, lighting and sound system, stage, rigging, entertainment and talent, on-site management, and many more.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /About -->

    <!-- What we do -->
    <section class="what-we-do">
        <div class="container">
            <h1 style="text-align: center;"><strong>WHAT WE DO</strong></h1>
            <hr class="midline">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="what-we-do-item">
                        <i class="fa fa-calendar-alt"></i>
                        <h3>Event Organizing</h3>
                        <p>Concept & Creative Development is the initial stage that leads to the creation of a Production Plan, which is then executed through Event Management</p>
                    </div>
                    <div class="what-we-do-item">
                        <i class="fa fa-microphone"></i>
                        <h3>Technical Event Production</h3>
                        <p>We provide all the technical support you need for your event, from lighting and sound to staging and rigging.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="what-we-do-item">
                        <i class="fa fa-palette"></i>
                        <h3>Design and Decoration</h3>
                        <p>We will work with you to create a custom design and décor for your event that will reflect your brand and style.</p>
                    </div>
                    <div class="what-we-do-item">
                        <i class="fa fa-users"></i>
                        <h3>On-site Management</h3>
                        <p>We will be on-site to ensure that your event runs smoothly and that your guests have a memorable experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Parthership -->
    <section class="partnership">
        <div class="container">
            <h1 style="text-align: center;"><strong>OUR PARTNERSHIP</strong></h1>
            <hr class="midline">
            <br>
            <div class="row" data-aos="zoom-in">
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/swissbel.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/marriot.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/Pondok_Indah_Mall..png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/1960s_Gucci_Logo.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/1280px-Zara_Logo.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/starbucks.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--/ Parthership -->

    <!--Team -->
    <section class="team">
        <div class="container">
            <h1 style="text-align: center;"><strong>MEET OUR TEAM</strong></h1>
            <hr class="midline">
            <br>
            <div class="card-group">
                <div class="card">
                    <img src="{{ asset('images/billy.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Rafael Billy</h5>
                        <p class="card-text text-center">UI UX Designer & Developer</p>
                        <div class="social-media">
                            <a href="https://www.linkedin.com/in/rafaelbilly/"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.instagram.com/rafaelbilly_/"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('images/juneta.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Juneta Julia</h5>
                        <p class="card-text text-center">UI UX Designer & Developer</p>
                        <div class="social-media">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('images/nikken.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Nikken Carmelia</h5>
                        <p class="card-text text-center">UI UX Designer & Developer</p>
                        <div class="social-media">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Team -->

    <!-- Client -->
    <section class="clients">
        <div class="container">
            <h1 style="text-align: center;"><strong>OUR HAPPY CLIENTS</strong></h1>
            <hr class="midline">
            <br>
            <div class="row row-cols-1 row-cols-md-4 g-4">

                <div class="col">
                    <div class="card h-100">


                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Client -->

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>SemestaGroup @ 2023. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- scroll Up -->
    <a href="#" class="scroll-top">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
        });

        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>

    <script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                document.querySelector('.scroll-top').style.opacity = 1;
                document.querySelector('.scroll-top').style.visibility = 'visible';
            } else {
                document.querySelector('.scroll-top').style.opacity = 0;
                document.querySelector('.scroll-top').style.visibility = 'hidden';
            }
        });
    </script>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>