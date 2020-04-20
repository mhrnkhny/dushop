@extends('layouts.panel')
@section('title','sliderUpdate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Slider / update</h1>
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
                <h3 class="card-title">crate slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" action="{{route('slider.update',['slider'=>$sliders->id])}}" method="post">
                @csrf
                @method('put')
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
                        <input name="image" type="file" class="form-control" id="image" value="{{$sliders->image}}">
                    </div>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{$sliders->name}}">
                    </div>
                    <div class="form-group">
                        <label for="title">title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$sliders->title}}">
                    </div>
                    <div class="form-group">
                        <label for="coupon">coupon</label>
                        <input name="coupon" type="text" class="form-control" id="coupon" value="{{$sliders->coupon}}">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control">{{$sliders->description}}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> save</i></button>
                </div>
            </form>
        </div>
    </div>




    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection
