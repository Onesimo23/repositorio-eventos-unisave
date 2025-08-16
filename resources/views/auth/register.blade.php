<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositório de Eventos | Registro</title>

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
        .register-page {
            background: linear-gradient(120deg, #3498db, #2ecc71);
        }

        .register-box {
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

        .text-danger {
            font-size: 0.875rem;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1">
                    <img src="{{ asset('Assets/unisave logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 100px">
                    <br>
                    <b>Repositório</b>Eventos
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg mb-4">Registre-se para começar sua jornada</p>

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            placeholder="Nome completo" value="{{ old('name') }}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" required>
                            <option value="">Selecione seu tipo de conta</option>
                            <option value="usuario" {{ old('role') == 'usuario' ? 'selected' : '' }}>Usuário</option>
                            <option value="organizador" {{ old('role') == 'organizador' ? 'selected' : '' }}>Organizador</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                    </div>
                    @error('role')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmar senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-7">
                            <a href="{{ route('login') }}" class="text-center">
                                <i class="fas fa-arrow-left mr-1"></i> Já tenho uma conta
                            </a>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-user-plus mr-1"></i> Registrar
                            </button>
                        </div>
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
            $('.register-box').hide().fadeIn(1000);

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