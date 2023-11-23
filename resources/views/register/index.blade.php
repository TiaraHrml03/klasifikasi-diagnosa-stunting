@extends('layout.login')
@section('title','Register')
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
                                    {{-- <div class="row justify-content-center">
                                        <div class="col-lg-5"> --}}
                                            {{-- Jika berhasil melakukan register alert ini akan muncul, alert ini diatur didalam RegisterController --}}
                                            @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session ('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                            <div class="container">
                                                <main class="form-register">
                                                    <form action="register" method="POST">
                                                        @csrf
                                                        <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                                                        <div class="form-floating">
                                                            <label fpr="name">Name</label>
                                                            <input type="text" name="name" class="form-control mt-2" id="name" placeholder="">
                                                        </div><br>
                                                        <div class="form-floating">
                                                            <label fpr="email">Email Address</label>
                                                            <input type="text" name="email" class="form-control mt-2" id="email" placeholder="">
                                                        </div><br>
                                                        <div class="form-floating">
                                                            <label fpr="password">Password</label>
                                                            <input type="text" name="password" class="form-control mt-2" id="password" placeholder="">
                                                        </div>
                                                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Submit</button>
                                                    </form>
                                                    <small class="d-block text-center mt-3">Sudah punya akun? <a href="login" class="text-primary">Login</a></small>
                                                </main>
                                            </div>
                                        {{-- </div>
                                    </div> --}}
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