@extends('layouts.panel')
@section('title','productCreate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / create</h1>
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
            <form role="form" enctype="multipart/form-data" action="{{route('product.store')}}" method="post">
                @csrf
                @include('errors.inputError')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="product_key">product_key</label>
                        <input name="product_key" type="text" class="form-control" id="product_key"
                               placeholder="Enter product_key">
                    </div>
                    <div class="form-group">
                        <label for="seller">seller</label>
                        <input name="seller" type="text" class="form-control" id="seller" placeholder="seller">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label for="number">number</label>
                        <input name="number" type="number" class="form-control" id="number" placeholder="number">
                    </div>
                    <div class="form-group">
                        <label for="sex">sex</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value="">-</option>
                            <option value="all">all</option>
                            <option value="women">women</option>
                            <option value="men">men</option>
                            <option value="childish">childish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="existence">existence</label>
                        <select name="existence" id="existence" class="form-control">
                            <option value="">-</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_name">category_name</label>
                        <select name="category_name" id="category_name" class="form-control">
                            <option value="">-</option>
                            <option value="shoes">shoes</option>
                            <option value="manto">manto</option>
                            <option value="coats">coats</option>
                            <option value="pants">pants</option>
                            <option value="bags">bags</option>
                            <option value="shirts">shirts</option>
                            <option value="Tshirts">Tshirts</option>
                            <option value="shirts">underwear</option>
                            <option value="hats">hats</option>
                            <option value="socks">socks</option>
                            <option value="glasses">glasses</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">image product</label>
                        <input name="image" type="file" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" class="form-control" id="description"
                                  placeholder="description"></textarea>
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
        CKEDITOR.replace('description');
    </script>
@endsection
