@extends('layouts.site')
@section('title','سبدخرید')
@section('content')

    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row" dir="rtl" align="right">
                <div class="col-lg-8">
                    <div class="cart-table">
                        <h3>سبد خرید شما</h3>
                        <div class="cart-table-warp">
                            <table>
                                <thead>
                                <tr>
                                    <th class="">نام محصول</th>
                                    <th class="quy-th">تعداد</th>
                                    <th class="size-th">سایز</th>
                                    <th class="total-th">قیمت</th>
                                </tr>
                                </thead>
                                @if (session()->has('carts'))
                                <tbody>
                                    @php $price = 0 @endphp
                                    @foreach (session()->get('carts') as $key=>$value)
                                        @php $products = \App\Product::find($key) ;
                                            $total = $products->price  * $value;
                                            $price += $total;
                                        @endphp
                                        @php
                                            @endphp
                                        @if (!empty($products))
                                            <tr>
                                                <td class="product-col">
                                                    @if(!empty($products->image))
                                                        <a href="{{$products->path()}}"> <img
                                                                src="{{url($products->image)}}" alt=""
                                                                class="img-thumbnail"></a>
                                                    @endif

                                                    <div class="pc-title">
                                                        <h4>{{$products->name}}</h4>
                                                        <p>{{$products->product_key}}</p>
                                                    </div>
                                                </td>
                                                <td class="quy-col">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" value="{{$value}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="size-col"><h4>Size M</h4></td>

                                                <td class="total-col"><h4> {{$total}} تومان </h4>
                                                </td>
                                            </tr>

                                        @endif

                                    @endforeach
                                </tbody>
                                @else
                                    <tr>
                                     <div class="alert alert-danger" align="center">سبد خرید شما خالی می باشد</div>
                                    </tr>
                                @endif

                            </table>
                        </div>
                        <div class="total-cost">
                            @if(session()->has('carts'))
                            <h6 dir="rtl" align="left">مجموع : <span> {{$price}} تومان </span></h6>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card-right">
                    <form class="promo-code-form">
                        <input type="text" placeholder="کد تخفیف خود را وارد کنید..">
                        <button>اعمال کد</button>
                    </form>
                    <a href="" class="site-btn">Proceed to checkout</a>
                    <form action="{{route('payment')}}" method="post">
                        @csrf
                        @if (session()->has('carts'))
                            <input type="hidden" value="{{$price}}" name="price">
                        @endif
                        <button class="site-btn sb-dark">ادامه خرید</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->


@endsection
