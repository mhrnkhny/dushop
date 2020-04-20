<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DUSHOP register</title>
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
<body class="hold-transition login-page"  style="background-image: url('../../image/loginphoto.jpg')">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>EDIT</b>dushop</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">اطلاعات خود را ویرایش کنید</p>

            <form action="{{route('update.Info',['id'=>auth()->user()->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('errors.inputError')
                <div class="input-group mb-3">
                    <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" placeholder="firstName"   value="{{auth()->user()->firstName}}" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" placeholder="lastName"   value="{{auth()->user()->lastName}}" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="national_code" class="form-control @error('national_code') is-invalid @enderror" placeholder="national_code"   value="{{auth()->user()->national_code}}" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-qrcode"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('password') is-invalid @enderror" placeholder="Email"
                           value="{{auth()->user()->email}}" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-at"></span>
                        </div>
                    </div>
                </div>
              
                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="image"
                           value="{{old('image')}}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-image"></span>
                        </div>
                    </div>
                </div>

                <div class="row" dir="rtl" >
                    <!-- /.col -->

                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> ویرایش</button>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->
            <br>
            <p class="mb-0">
                <i class="fa fa-backward"></i>
                <a href="{{route('profile')}}" class="text-center">بازگشت </a>
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


