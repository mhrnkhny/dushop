@extends('layouts.panel')
@section('title','commentCheck')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Comment / check </h1>
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

        @foreach ($comments as $comment)
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">crate users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('comment.update',[$comment->id])}}" method="post">
                @csrf
                @method('put')
                @include('errors.inputError')

                <div class="card-body">
                    @if (!empty($comment->product_id))
                        <div class="form-group">
                            <label for="role">productName</label>
                            <input type="text" name="" value="{{$comment->product->name}}" class="form-control">
                            <input type="hidden" name="product_id" value="{{$comment->product->id}}" class="form-control">
                        </div>
                    @else
                        <label for="" class="alert alert-default-dark">این یه سوال از طرف کاربر است</label>
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" value="{{$comment->title}}" class="form-control">
                        </div>
                    @endif

                        <div class="form-group">
                            <label for="role">userName</label>
                            <input type="text" name="" value="{{$comment->user->fullName()}}" class="form-control">
                            <input type="hidden" name="user_id" value="{{$comment->user->id}}">
                        </div>

                        <div class="form-group">
                            <label for="role">message</label>
                            <textarea name="message" class="form-control">{{$comment->message}}</textarea>
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"> insert</i></button>

                </div>
            </form>
            <div class="card-footer">

            <form action="{{route('comment.destroy',['comment'=>$comment->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" value="{{$comment->id}}">
                <button class="btn-danger btn"><i class="fa fa-trash"> delete</i></button>
            </form>
            </div>

        </div>

        @endforeach
        {{$comments->links()}}

    </div>



@endsection
