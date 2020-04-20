<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DUSHOP information</title>
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
        <a href="{{route('profile')}}"><b>INFORMATION</b>dushop</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">شما میتوانید اطلاعات تکمیلی خود را وارد کنید</p>

            <form action="{{route('store.Info')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="input-group mb-4">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <input dir="rtl" type="number" name="number" class="form-control @error('number') is-invalid  @enderror"
                           placeholder="شماره تلفن" value="{{old('number')}}" >

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <textarea dir="rtl" name="address" class="form-control  @error('address') is-invalid @enderror"
                              placeholder="آدرس محل زندگی "></textarea>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-comment"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input dir="rtl" type="number" name="postal_code" class="form-control @error('postal_code') is-invalid  @enderror"
                           placeholder="کدپستی" value="{{old('postal_code')}}" >

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-code"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> ذخیره </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->
            <br>
            <p class="mb-0">
                <a href="{{route('profile')}}" class="text-center">بازگشت به صفحه پروفایل</a>
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


