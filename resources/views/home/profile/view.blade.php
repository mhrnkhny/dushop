@extends('layouts.site')
@section('title','صفحه شخصی '.auth()->user()->firstName)
@section('content')
    <section class="cart-section spad" style="background-image: url('../image/Capture.PNG')">
        <div class="container">
            <div class="row" dir="rtl" align="right">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <h3>پروفایل شخصی شما</h3>
                        <div class="cart-table-warp">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th><h5>نام کاربری</h5></th>
                                    <th><h5>ایمیل</h5></th>
                                    <th><h5>کدملی</h5></th>
                                    <th><h5>شماره تلفن</h5></th>
                                    <th><h5>آدرس محل زندگی</h5></th>
                                    <th><h5>کدپستی</h5></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr align="center">
                                    <td class="product-col">
                                        @if(!empty(auth()->user()->image))
                                            <img src="{{url(auth()->user()->image)}}" alt="" class="img-thumbnail">
                                        @else
                                            <img src="{{url('image/img/cart/1.jpg')}}" alt="" class="img-thumbnail">

                                        @endif

                                        <div class="pc-title">
                                            <h4>{{auth()->user()->fullName()}}</h4>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        {{auth()->user()->email}}

                                    </td>

                                    <td class="total-col"><h4>{{auth()->user()->national_code}}</h4></td>
                                    <td class="size-col"><h4>
                                            @if (!empty($phones))
                                                <ul>
                                                @foreach($phones as $phone)
                                                    <li>
                                                        {{$phone->number}}
                                                    </li>
                                                @endforeach
                                                </ul>
                                            @else
                                                <div class="alert-danger alert">                                              ناموجود
                                                </div>
                                            @endif
                                        </h4></td>
                                    <td class="size-col"><h4>
                                            @if (!empty($addresses))
                                                    <ul>
                                                @foreach($addresses as $address)
                                                    <li>
                                                        {!! $address->address !!}
                                                    </li>
                                                @endforeach
                                                    </ul>
                                            @else
                                                <div class="alert-danger alert">                                              ناموجود
                                                </div>
                                            @endif
                                        </h4></td>
                                    <td class="size-col"><h4>
                                            @if (!empty($addresses))
                                                <ul>
                                                @foreach($addresses as $address)
                                                    <li>
                                                        @if(!$address->postal_code == null)
                                                        {{$address->postal_code}}
                                                            @else
                                              کدپستی ثبت نشده
                                                        @endif

                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="alert-danger alert">                                              ناموجود
                                                </div>
                                            @endif
                                        </h4></td>
                                </tr>

                            </table>
                        </div>
                        <div class="total-cost">

                                <a href="{{route('Info')}}" class="btn btn-outline-light"><i class="fa fa-plus"> ثبت اطلاعات بیشتر</i></a>
                                <a href="{{route('edit.profile',['id'=>auth()->user()->id])}}" class="btn btn-outline-light"><i class="fa fa-edit"> ویرایش اطلاعات </i></a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br>
        <div class="container">
            <div class="row" dir="rtl" align="right">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <h3>پرداختی ها</h3>
                        <div class="cart-table-warp">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th><h5>شماره ردیف</h5></th>
                                    <th><h5>شماره تراکنش</h5></th>
                                    <th><h5>زمان خریداری شده</h5></th>
                                    <th><h5>وضعیت پرداخت</h5></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                <tr align="center">

                                        <td class="size-col"><h4>{{$payment->id}}</h4></td>
                                        <td class="size-col"><h4>
                                                @if($payment->authority == 0)
                                                    عملیات خرید نا موفق بود
                                                    @else
                                                    {{$payment->authority}}
                                                @endif
                                            </h4></td>
                                        <td class="size-col"><h4>{{jdate($payment->created_at)->format('G:i:s |  Y/m/d')}}</h4></td>
                                        <td class="size-col"><h4>
                                                @if($payment->success == 0)
                                                    ناموفق
                                                    @else
                                                    موفق
                                                    @endif
                                            </h4></td>


                                </tr>
                                @endforeach

                            </table>
                        </div>
                        <div class="total-cost">

                            <a href="{{route('factor')}}" class="btn btn-outline-light"><i class="fa fa-shopping-bag"> سبد فاکتور خرید</i></a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
