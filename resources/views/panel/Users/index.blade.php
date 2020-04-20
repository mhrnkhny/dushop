@extends('layouts.panel')
@section('title','userIndex')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users / index</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User table</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User table</h3>

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
                                <th>image</th>
                                <th>firstName & lastName</th>
                                <th>nationalCode</th>
                                <th>role</th>
                                <th>email</th>
                                <th>phones</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                        @if ($user->image)

                                            <img src="{{url($user->image)}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @else
                                            <img src="{{url('image/images.jpg')}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>{{$user->fullName()}}</td>
                                    <td>{{$user->national_code}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    @if ($user->phone)
                                        <td>
                                            @foreach($user->phone as $phone)
                                                {{$phone->number}}<br>
                                            @endforeach

                                        </td>
                                    @endif

                                    <td><a href="{{route('user.edit',['user'=>$user->id])}}" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('user.destroy',['user'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$user->id}}" name="user_id">
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <br>
                        {{$Users->links()}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
