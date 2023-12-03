@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<style>
    .content-body{
        margin-left:0 !important;
    }
</style>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    @if (session('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="container">
                                        <main class="form-login">
                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <h1 class="h3 mb-3 fw-normal">Login</h1>
                                                <div class="form-floating">
                                                    <label for="email">Username</label>
                                                    <input placeholder="username"
                                                        class="form-control mt-2 {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                                        name="name" value="{{ old('name') }}" autofocus required>
                                                </div><br>
                                                <div class="form-floating">
                                                    <label for="password">Password</label>
                                                    <input class="form-control mt-2 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        type="password" name="password" placeholder="Password" required>
                                                </div>
                                                @if (session('error'))
                                                    <div class="col-md-12">
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ session('error') }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
                                            </form>
                                            <small class="d-block text-center mt-3">Belum punya akun? <a
                                                    href="{{ route('register') }}">Register</a></small>
                                        </main>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <!-- Favicon icon -->
    <link rel="icon" type="../assets/image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Required vendors -->
    <script src="./assets/vendor/global/global.min.js"></script>
    <script src="./assets/js/quixnav-init.js"></script>
    <script src="./assets/js/custom.min.js"></script>

@endsection
