@extends('layouts.panel')
@section('title','productColorCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / color / create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">crate product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"  action="{{route('color.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">
                    <div class="form-group">
                        <label for="color">colorName</label>
                        <input name="colorName" type="text" class="form-control" id="color" placeholder="Enter color name">
                    </div>

                    <div class="form-group">
                        <label for="product">product_name</label>
                        <select name="product_id" id="product" class="form-control">
                            <option value="">-</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}{{$product->product_key}}</option>
                           @endforeach
                        </select>
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
                        <h3 class="card-title">Product table</h3>

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
                                <th>colorName</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)

                                <tr>
                                    <td>{{$color->id}}</td>
                                    <td>
                                        @if (!empty($color->product))
                                            {{$color->product->product_key}}  -  {{$color->product->name}}
                                        @else
                                            <span class="alert-danger">این محصول حذف شده است</span>
                                        @endif

                                    </td>
                                    <td>{{$color->colorName}}</td>


                                    <td><a href="{{route('color.edit',['color'=>$color->id])}}" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('color.destroy',['color'=>$color->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$color->id}}" name="product_id">
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
