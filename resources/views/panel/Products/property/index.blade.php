@extends('layouts.panel')
@section('title','propertyIndex')

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
                                <th>product-name</th>
                                <th>property-text</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>{{$property->id}}</td>
                                    <td>{{$property->product->name}}</td>
                                    <td>
                                        {{$property->property_text}}
                                    </td>


                                    <td><a href="{{route('property.edit',['property'=>$property->id])}}"
                                           class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('property.destroy',['property'=>$property->id])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$property->id}}" name="user_id">
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
