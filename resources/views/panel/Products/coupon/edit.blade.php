@extends('layouts.panel')
@section('title','productCouponUpdate')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products / coupon / update</h1>
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
            <form role="form" action="{{route('coupon.update',['coupon'=>$coupons->id])}}" method="post">
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
                        <label for="discount">discount-name</label>
                        <input type="text" class="form-control" name="discount" value="{{$coupons->discount}}">
                    </div>
                    <div class="form-group">
                        <label for="amount">amount</label>
                        <input type="number" class="form-control" name="amount" value="{{$coupons->amount}}">
                    </div>
                    <div class="form-group">
                        <label for="discount_object">discount_object</label>
                        <input type="text" class="form-control" name="discount_object" value="{{$coupons->discount_object}}">
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
