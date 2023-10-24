<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            background: #ececec;
            padding: 0 20px 0 20px;
            background: #303030;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .side-image {
            background-image: url("{{ asset('images/event-1.jpg') }}");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;
            position: relative;
        }

        .row {
            width: 900px;
            height: 550px;
            border-radius: 10px;
            background: #fff;
            padding: 0px;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .text p {
            color: #fff;
            font-size: 20px;
        }

        i {
            font-weight: 400;
            font-size: 15px;
        }

        .right {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .input-box {
            width: 330px;
            box-sizing: border-box;
        }

        img {
            width: 35px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .form {
            width: 330px;
            margin: 0 auto;
        }
        

        .signup {
            text-align: center;
            font-size: small;
            margin-top: 20px;
        }

        span a {
            text-decoration: none;
            font-weight: 700;
            color: #000;
            transition: .5s;
        }

        span a:hover {
            text-decoration: underline;
            color: #000;
        }

        @media only screen and (max-width: 768px) {
            .side-image {
                border-radius: 10px 10px 0 0;
            }

            img {
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
            }

            .text {
                position: absolute;
                top: 70%;
                text-align: center;
            }

            .text p,
            i {
                font-size: 16px;
            }

            .row {
                max-width: 420px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                </div>
                <div class="col-md-6 right">
                    <form class="form">
                        <div>
                            <h4 class="mb-3 text-center"><strong>LOGIN</strong></h4>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username" required />
                            <label for="floatingInput">Username</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required />
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button type="submit" style="width: 100%;" class="btn btn-primary btn-block mb-2 mt-3">
                            Login
                        </button>
                        <div class="signup">
                            <span>Don't have an Account? <a href="{{ url('register') }}">Register</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector(".form");
            const usernameInput = document.querySelector("#floatingInput");
            const passwordInput = document.querySelector("#floatingPassword");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const username = usernameInput.value;
                const password = passwordInput.value;

                if (username === "user" && password === "user") {
                    window.location.href = "{{ url('dashboard') }}";
                } else if (username === "admin" && password === "admin"){
                    window.location.href = "{{ url('dashboard2') }}";
                } else {
                    alert("Invalid username or password. Please try again.");
                }
            });
        });
    </script>
</body>

</html>