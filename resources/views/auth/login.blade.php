<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DUSHOP login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{url('css/panel/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('css/panel/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('css/panel/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition login-page" style="background-image: url('../image/loginphoto.jpg')">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>LOGIN</b>dushop</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">شما پس از ورود می توانید ادامه دهید</p>

            <form action="{{route('login')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="input-group mb-4">
                    <input dir="rtl" type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                           placeholder="ایمیل" value="{{old('email')}}" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-at"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input dir="rtl" type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                           placeholder="پسورد">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                به خاطر داشته باش
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        @component('components.button',['buttonName'=>'ورود','class'=>'btn btn-primary btn-block'])
                            @slot('icon')
                                <i class="fas fa-sign-in-alt"></i>
                            @endslot
                            @endcomponent
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- یا  -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> ورود با استفاده از  فیس بوک
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> ورود با استفاده از گوگل
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('آیا رمز خود را فراموش کردین؟') }}
                    </a>
                @endif
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center btn btn-link">ثبت نام نکردم</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->


<!-- jQuery -->
<script src="{{url('js/panel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('js/panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('js/panel/adminlte.min.js')}}"></script>

</body>
</html>


