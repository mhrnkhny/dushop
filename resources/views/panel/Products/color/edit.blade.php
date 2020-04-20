@extends('layouts.panel')
@section('title','productColorUpdate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / color / update</h1>
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
            <form role="form"  action="{{route('color.update',['color'=>$colors->id])}}" method="post">
                @csrf
                @method('put')
                @include('errors.inputError')
                <div class="card-body">
                    <div class="form-group">
                        <label for="color">colorName</label>
                        <input name="colorName" type="text" class="form-control" id="color" value="{{$colors->colorName}}">
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> update</i></button>
                </div>
            </form>
        </div>

    </div>



@endsection
