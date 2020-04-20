@extends('layouts.panel')
@section('title','galeryCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / galery</h1>
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
            <form role="form" enctype="multipart/form-data" action="{{route('galery.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">

                    <div class="form-group">
                        <label for="sex">product-name</label>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">-</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}} - {{$product->product_key}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input name="image" type="file" class="form-control" id="image" >
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> save</i></button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($galeries as $galery)
            <div class="col-md-3">
                @if ($galery->image)

                    <img src="{{url($galery->image)}}" alt="" class="img-thumbnail"
                         style="height: 250px;width: 250px;">
                @else
                    <img src="{{url('image/images.jpg')}}" alt="" class="img-thumbnail"
                         style="height: 50px;width: 50px;">
                @endif
                <div class="row" >
                    <div class="col-md-6">
                        <form action="{{route('galery.destroy',['galery'=>$galery->id])}}" dir="ltr" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="product_id" value="{{$galery->id}}">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="col-md-6"  align="right">

                            @if (!empty($galery->product->id))
                            <p>{{$galery->product->name}}<br>{{$galery->product->product_key}}</p>

                        @else
                                <alter class="alert-danger"> this product not it
                                </alter>
                            @endif

                    </div>

                </div>

            </div>
                @endforeach
        </div>

    </div>





@endsection
