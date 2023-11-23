@extends('layout.login')
@section('title','Login')
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
                                        {{ session ('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="container">
                                        <main class="form-login">
                                        <form action="{{route('login-prosses')}}" method="POST">
                                        @csrf
                                        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                                        {{-- <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" value="hello@example.com">
                                        </div> --}}
                                        <div class="form-floating">
                                            <label for="email">Email address</label>
                                            <input type="email" name="email" class="form-control mt-2" id="email" placeholder="name@example.com" autofocus>
                                        </div><br>
                                        <div class="form-floating">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password">
                                        </div>
                                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
                                        </form>
                                            <small class="d-block text-center mt-3">Belum punya akun? <a href="{{route('register')}}" class="text-primary">Register</a></small>
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


@endsection