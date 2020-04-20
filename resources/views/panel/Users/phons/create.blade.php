@extends('layouts.panel')
@section('title','userPhoneCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users / Phones</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Phone</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">crate PhoneUser</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('phones.store')}}" method="post">
                @csrf
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
                               placeholder="Enter phone number">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> savePhone</i></button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">UserPhone table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <form action="" method="get">
                                    <div class="input-group-append">
                                        <input type="text" name="search" value="{{request('search')}}" class="form-control float-right"
                                               placeholder="Search firstName">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>phones</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phones as $phone)
                                <tr>
                                    <td>{{$phone->id}}</td>
                                    <td>
                                        @if (!empty($phone->user->id))
                                            {{$phone->user->fullName()}}
                                        @else
                                            <alter class="alert alert-danger"> this user is removed
                                            </alter>
                                        @endif
                                    </td>
                                    <td>{{$phone->number}}</td>
                                    <td><a href="{{route('phones.edit',['phone'=>$phone->id])}}" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('phones.destroy',['phone'=>$phone->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$phone->id}}">
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$phones->links()}}
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>



@endsection
