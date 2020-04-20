@extends('layouts.panel')
@section('title','userAddressCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users / Address</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Address</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">crate address for User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('address.store')}}" method="post">
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
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address"
                                  placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="postal">PostalCode</label>
                        <input type="number" name="postal_code" class="form-control" id="postal"
                               placeholder="Enter postalCode">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> saveAddress</i></button>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">UserAddress table</h3>

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
                                    <th>address</th>
                                    <th>postalCode</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addresses as $address)
                                    <tr>
                                        <td>{{$address->id}}</td>
                                        <td>
                                            @if (!empty($address->user->id))
                                                {{$address->user->fullName()}}
                                            @else
                                                <alter class="alert alert-danger"> this user is removed
                                                </alter>
                                            @endif
                                        </td>
                                        <td>{!!$address->address!!}</td>
                                        <td>{{$address->postal_code}}</td>
                                        <td><a href="{{route('address.edit',['address'=>$address->id])}}"
                                               class="btn btn-info"><i
                                                    class="fa fa-edit"></i></a></td>
                                        <td>
                                            <form action="{{route('address.destroy',['address'=>$address->id])}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{$address->id}}">
                                                <button class="btn btn-danger"><i class="fa fa-trash"
                                                                                  aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{$addresses->links()}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'address' );
    </script>
@endsection
