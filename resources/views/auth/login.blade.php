<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | {{ env("APP_NAME") }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    
    <link rel="stylesheet" href="{{ asset("template") }}/assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="{{ asset("template") }}/assets/css/style-preset.css" >

    <style>
        body, html {
        height: 100%;
        margin: 0;
        overflow-x: hidden;
        }

        .auth-main {
        min-height: 100vh;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 20px;
        background: #f4f7fa;
        }

        .auth-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        }

        .auth-form {
        width: 100%;
        max-width: 450px; 
        }

        .card {
        border: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        margin-bottom: 0 !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="loader-bg">
        <div class="loader-track">
        <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper">
        <div class="auth-form">
            <div class="card">
            <div class="card-body p-4"> <div class="text-center mb-4">
                <h3 class="mb-2"><b>{{ env("APP_NAME") }}</b></h3>
                <p class="text-muted">Welcome !</p>
                </div>
                
                <form action="{{ route("login") }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    <div class="form-group mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

    <script src="{{ asset("template") }}/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset("template") }}/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset("template") }}/assets/js/pcoded.js"></script>

    <script>
        layout_change('light');
        font_change("Public-Sans");
    </script>
</body>
</html>