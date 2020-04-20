@extends('layouts.site')
@section('title','فاکتور خرید')
@section('content')

    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row" dir="rtl" align="right">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <h3>صفحه فاکتور</h3>
                        <div class="cart-table-warp">
                            <table>
                                <thead>
                                <tr>
                                    <th>نام محصول</th>
                                    <th class="quy-th">تعداد</th>
                                    <th class="size-th">سایز</th>
                                    <th class="total-th">قیمت</th>
                                </tr>
                                </thead>
                                @if(\App\payment::where('success',1)->where('user_id',auth()->user()->id)->first())
                                    @if (session()->has('carts'))
                                        <tbody>
                                        @php $price = 0 @endphp
                                        @foreach (session()->get('carts') as $key=>$value)
                                            @php $products = \App\Product::find($key) ;
                                            $total = $products->price * $value;
                                            $price += $total;
                                            @endphp

                                            @php
                                                @endphp
                                            @if (!empty($products))
                                                <tr>
                                                    <td class="product-col">
                                                        @if(!empty($products->image))
                                                            <img src="{{url($products->image)}}" alt=""
                                                                 class="img-thumbnail">
                                                        @endif

                                                        <div class="pc-title">
                                                            <h4>{{$products->name}}</h4>
                                                            <p>{{$products->product_key}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="quy-col">
                                                        <div class="quantity">
                                                            <span>{{$value}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="size-col"><h4>Size M</h4></td>

                                                    <td class="total-col"><h4> {{$total}} تومان </h4>
                                                    </td>
                                                </tr>

                                            @endif

                                        @endforeach


                                        </tbody>

                                    @endif
                                @else
                                    <tr>
                                        <div class="alert alert-danger" align="center">سبد فاکتور شما خالی می باشد
                                        </div>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="total-cost">
                            @if(\App\payment::where('success',1)->where('user_id',auth()->user()->id)->first())
                            @if (session()->has('carts'))
                                <h6 dir="rtl" align="left">مجموع : <span> {{$price}} تومان </span></h6>
                            @endif
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->


@endsection
