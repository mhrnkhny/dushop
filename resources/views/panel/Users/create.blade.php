@extends('layouts.panel')
@section('title','userCreate')
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users / create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">crate users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" action="{{route('user.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">
                    <div class="form-group">
                        <label for="firstName">firstName</label>
                        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="Enter firstName" value="{{old('firstName')}}">
                    </div>
                    <div class="form-group">
                        <label for="lastName">lastName</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" placeholder="Enter lastName" value="{{old('lastName')}}">
                    </div>
                    <div class="form-group">
                        <label for="national_code">nationalCode</label>
                        <input name="national_code" type="text" class="form-control" id="national_code" placeholder="Enter nationalCode" value="{{old('national_code')}}">
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <select name="role" id="role">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            <option value="writer">writer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input name="photo" type="file" class="form-control" id="image">
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> save</i></button>
                </div>
            </form>
        </div>

    </div>



@endsection
