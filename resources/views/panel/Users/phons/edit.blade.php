@extends('layouts.panel')
@section('title','userPhoneUpdate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users / Phone / update</h1>
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
            <form action="{{route('phones.update',['phone'=>$phones->id])}}" method="post">
                @csrf
                @method('put')
                @include('errors.inputError')
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">userName</label>
                        <select name="user_id" id="" class="form-control">
                            <option value="">-</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->fullName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">number</label>
                        <input name="number" type="text" class="form-control" id="phone"
                               value="{{$phones->number}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> savePhone</i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
