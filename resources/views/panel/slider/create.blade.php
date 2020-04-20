@extends('layouts.panel')
@section('title','sliderCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Slider / create</h1>
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
            <form role="form" enctype="multipart/form-data" action="{{route('slider.store')}}" method="post">
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
                        <input name="image" type="file" class="form-control" id="image" placeholder="image">
                    </div>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="title">title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="coupon">coupon</label>
                        <input name="coupon" type="text" class="form-control" id="coupon" placeholder="coupon">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
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
                        <h3 class="card-title">slider table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
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
                                <th>name</th>
                                <th>product_name</th>
                                <th>title</th>
                                <th>description</th>
                                <th>coupon</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr align="center">
                                    <td>{{$slider->id}}</td>
                                    <td>
                                        @if ($slider->image)

                                            <img src="{{url($slider->image)}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @else
                                            <img src="{{url('image/images.jpg')}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>{{$slider->name}}</td>
                                    <td>
                                        @if (!empty($slider->product->name))
                                            {{$slider->product->name}}
                                        @else
                                            <div class="alert-danger">این محصول حذف شده است </div>
                                        @endif
                                    </td>
                                    <td>{{$slider->title}}</td>
                                    <td>{!! $slider->description !!}</td>
                                    <td>{{$slider->coupon}}</td>

                                    <td><a href="{{route('slider.edit',['slider'=>$slider->id])}}" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('slider.destroy',['slider'=>$slider->id])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$slider->id}}" name="user_id">
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$sliders->links()}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>




    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
