<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    
    <style>
        body {
            background: linear-gradient(120deg, #28a745, #218838);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .login-box {
            width: 400px;
        }

        .login-logo b {
            color: #fff;
        }

        .card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .cookie-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 1rem;
            text-align: center;
        }

        .other-login {
            margin-top: 1.5rem;
            text-align: center;
        }

        .other-login a.btn {
            margin-bottom: 0.5rem;
        }

        .admin-contact {
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <b>Dashboard</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to your account</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first() }}</strong>
                    </div>
                @endif

                <form action="{{ route('local.login.submit') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <div class="other-login">
                    <a href="{{ config('app.seeddms_url') }}" class="btn btn-outline-success btn-block">
                        <i class="fas fa-print mr-2"></i> Print Hub Login
                    </a>
                </div>

                <div class="admin-contact text-muted mt-3">
                    Need an account? Please contact the system administrator.
                </div>

                <div class="cookie-info">
                    This application uses cookies only for authentication and internal preferences. No data is shared with third parties.
                </div>
            </div>
        </div>
    </div>

    {{-- JS (optional) --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
