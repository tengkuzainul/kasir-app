<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir Apps - Register</title>

    @include('layouts.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <h1 class="h1 text-info"><b>Kasir Apps</b> <i class="fa fa-shopping-cart"></i></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Welcome to Kasir Apps, Please Sign In.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" class="form-control" placeholder="Full name" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" class="form-control" placeholder="Email" type="email" name="email"
                            :value="old('email')" required autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" class="form-control" placeholder="Password" type="password"
                            name="password" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password_confirmation" class="form-control" placeholder="Retype password"
                            type="password" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-1">
                            <button type="submit" class="btn btn-outline-info btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">Have account ? please Sign in</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    @include('layouts.scripts')
</body>

</html>
