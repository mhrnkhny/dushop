@extends('layouts.panel')
@section('title','commentCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Comment / create</h1>
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
            <form role="form" action="{{route('comment.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">

                    <div class="form-group">
                        <label for="role">userName</label>
                        <select name="user_id" id="role" class="form-control">
                            <option value="">-</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->fullName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">productName</label>
                        <select name="product_id" id="role" class="form-control">
                            <option value="">-</option>

                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <textarea class="form-control" name="message" id="description"
                                  placeholder="enter comment"></textarea>
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> save</i></button>
                </div>
            </form>
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
                                <th>user-name</th>
                                <th>product-name</th>
                                <th>message</th>
                                <th>success</th>
                                <th>question</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->user->fullName()}}</td>
                                        <td>
                                            @if (!empty($comment->product->name))
                                            {{$comment->product->name}}
                                                @else
                                                <span class="alert-warning">سوال از طرف کاربر</span>
                                            @endif

                                        </td>

                                    <td>{{$comment->message}}</td>
                                    <td>{{$comment->success}}</td>
                                    <td>{{$comment->question}}</td>

                                    <td><a href="{{route('comment.edit',['comment'=>$comment->id])}}" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('comment.destroy',['comment'=>$comment->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$comment->id}}" name="user_id">
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div>



@endsection
