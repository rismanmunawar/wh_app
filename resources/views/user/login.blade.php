<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhApp | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist')}}/css/adminlte.css">
</head>

<body class="hold-transition login-page">
    
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Wh</b>App</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label><strong>Username / Email :</strong></label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email Anda!" />
                    </div>
                    <div class="mb-3">
                        <label><strong>Password :</strong></label>
                        <input class="form-control" type="password" name="password" placeholder="Masukan Password Anda!"/>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>

                <p class="small text-center">Don't have an account <a href="/register" class="link-underline link-underline-opacity-0">Register</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('AdminLTE/plugins')}}jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('AdminLTE/plugins')}}bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE/dist')}}/js/adminlte.min.js"></script>
</body>

</html>