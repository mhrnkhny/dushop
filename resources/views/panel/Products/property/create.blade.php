@extends('layouts.panel')
@section('title','propertyCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / property / create</h1>
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
            <form role="form" action="{{route('property.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">

                    <div class="form-group">
                        <label for="product_id">product-name</label>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">-</option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}{{$product->product_key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="property_text">property</label>
                        <input type="text" name="property_text" id="property_text" class="form-control" placeholder="property">
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
