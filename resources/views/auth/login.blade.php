<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositório de Eventos | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Assets/dist/css/adminlte.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('Assets/plugins/toastr/toastr.min.css') }}">

    <style>
        .login-page {
            background: linear-gradient(120deg, #3498db, #2ecc71);
        }

        .login-box {
            width: 420px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            background-color: #fff;
            padding: 20px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 10px;
            padding: 10px;
            font-weight: bold;
        }

        .input-group-text {
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .login-box-msg {
            font-size: 1.1rem;
            color: #666;
        }

        .icheck-primary label {
            font-size: 0.9rem;
            color: #666;
        }

        .forgot-password {
            color: #666;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #3498db;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1">
                    <img src="{{ asset('Assets/unisave logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 100px">
                    <br>
                    <b>Repositório</b>Eventos
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg mb-4">Bem-vindo de volta! Faça login para continuar</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="row mb-4">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Lembrar-me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-sign-in-alt mr-1"></i> Entrar
                            </button>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        @if (Route::has('password.request'))
                        <p class="mb-2">
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                <i class="fas fa-key mr-1"></i> Esqueci minha senha
                            </a>
                        </p>
                        @endif
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center">
                                <i class="fas fa-user-plus mr-1"></i> Registrar uma nova conta
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('Assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('Assets/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Animação suave ao carregar
            $('.login-box').hide().fadeIn(1000);

            // Feedback visual nos campos
            $('.form-control').on('focus', function() {
                $(this).closest('.input-group').addClass('shadow-sm');
            }).on('blur', function() {
                $(this).closest('.input-group').removeClass('shadow-sm');
            });

            // Mostrar mensagens de erro com Toastr
            @if($errors->any())
            @foreach($errors->all() as $error)
            toastr.error('{{ $error }}');
            @endforeach
            @endif
        });
    </script>
</body>

</html>