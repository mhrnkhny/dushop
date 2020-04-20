@extends('layouts.panel')
@section('title','productIndex')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Product / index</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product table</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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
                                <th>image</th>
                                <th>name</th>
                                <th>price</th>
                                <th>seller</th>
                                <th>existence</th>
                                <th>property</th>
                                <th>product_key</th>
                                <th>description</th>
                                <th>sex</th>
                                <th>number</th>
                                <th>category</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Products as $product)
                                <tr align="center">
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if ($product->image)

                                            <img src="{{url($product->image)}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @else
                                            <img src="{{url('image/images.jpg')}}" alt="" class="img-thumbnail"
                                                 style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->seller}}</td>
                                    <td>{{$product->existence}}</td>
                                    <td>
                                        <ul>
                                            @foreach($product->property as $property)
                                                <li>
                                                    {{$property->property_text}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$product->product_key}}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>{{$product->sex}}</td>
                                    <td>{{$product->number}}</td>
                                    <td>{{$product->category_name}}</td>


                                    <td><a href="{{route('product.edit',['product'=>$product->id])}}"
                                           class="btn btn-info"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('product.destroy',['product'=>$product->id])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$product->id}}" name="user_id">
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$Products->links()}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
