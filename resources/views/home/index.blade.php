@extends('layouts.site')
@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- slider section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">

            @foreach($sliders as $slider)
                @if(!empty($slider->product->id))
                <div class="hs-item set-bg" data-setbg="{{url($slider->image)}}">
                    <div class="container">
                        <div class="row" align="right" dir="rtl">
                            <div class="col-xl-6 col-lg-7 text-white">
                                <span>{{$slider->title}} /
                                        {{$slider->product->name}}
                                </span>
                                <h2>{{$slider->name}}</h2>
                                <p>{!! $slider->description !!}</p>
                                <a href="{{route('allProduct')}}" class="site-btn sb-line">مشاهده بیشتر</a>
                                    <a href="{{$slider->product->path()}}" class="site-btn sb-white">مشاهده محصول</a>
                            </div>
                        </div>
                        <div class="offer-card text-white">
                            <span>تخفیف</span>
                            <h2>{{$slider->coupon}}</h2>
                            <p>خرید همین الان</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- advance section -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{url('image/img/icons/1.png')}}" alt="#">
                        </div>
                        <h2>
                            پرداخت های امن سریع</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{url('image/img/icons/2.png')}}" alt="#">
                        </div>
                        <h2>محصولات برتر</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{url('image/img/icons/3.png')}}" alt="#">
                        </div>
                        <h2>تحویل رایگان و سریع</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- advance section end -->


    <!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>آخرین محصولات</h2>
            </div>
            @if (!empty($products1))

                <div class="product-slider owl-carousel">
                    @foreach($products1 as $product)
                        <div class="product-item">

                            <div class="pi-pic">
                                @if ($product->image)
                                    <a href="{{$product->path()}}"> <img src="{{url($product->image)}}" alt="">
                                    </a>
                                @else
                                    <a href="{{$product->path()}}"><img src="{{url('image/img/product/8.jpg')}}" alt=""></a>

                                @endif
                                <div class="pi-links">
                                    <a onclick="add_cart({{$product->id}})" href="{{route('homeIndex')}}"
                                       class="add-card"><i
                                            class="flaticon-bag"
                                            style="color: green"></i><span>افزودن به سبد خرید</span></a>

                                    @if ($product->is_liked_by_auth_user())
                                        <a href="{{route('dis.like',['id'=>$product->id])}}"
                                           class="add-card"><i
                                                class="fa fa-heart"
                                                style="color: red"></i><span> {{$product->like()->get()->count()}}</span></a>

                                    @else
                                        <a href="{{route('like',['id'=>$product->id])}}"
                                           class="add-card"><i
                                                class="flaticon-heart"
                                                style="color: red"></i><span> {{$product->like()->get()->count()}}</span></a>

                                    @endif
                                </div>
                            </div>
                            <div class="pi-text" align="right" dir="rtl">
                                <p>{{$product->name}}
                                    @if ($product->existence == 0)
                                        <span class="alert-danger">(موجود نیست)</span>
                                    @endif
                                </p>
                                <h6>{{$product->price}} تومان </h6>

                            </div>

                        </div>
                    @endforeach

                    @else
                        <div class="alert alert-danger" dir="rtl" align="center">
                            محصولی به ثبت نرسیده است
                        </div>
                </div>
            @endif

        </div>
    </section>
    <!-- letest product section end -->


    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>محصولات فروش بالا</h2>
            </div>
            <ul class="product-filter-menu" dir="ltr" align="right">
                <li><a href="#">کلاه ها</a></li>
                <li><a href="#">کفش ها</a></li>
                <li><a href="#">مانتو ها</a></li>
                <li><a href="#">کت ها</a></li>
                <li><a href="#">شلوار ها</a></li>
                <li><a href="#">کیف ها</a></li>
                <li><a href="#">پیراهن ها</a></li>
                <li><a href="#">لباس زیر ها</a></li>
                <li><a href="#">جوراب ها</a></li>
                <li><a href="#">عینک ها</a></li>
            </ul>
            <div class="row" dir="rtl">

                @foreach($products2 as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                @if ($product->image)
                                    <a href="{{$product->path()}}"><img src="{{url($product->image)}}" alt=""></a>
                                @else
                                    <a href="{{$product->path()}}"><img src="{{url('image/img/product/8.jpg')}}" alt=""></a>

                                @endif
                                <div class="pi-links">
                                    <a onclick="add_cart({{$product->id}})" href="{{route('homeIndex')}}"
                                       class="add-card"><i class="flaticon-bag" style="color: green"></i><span>افزودن به سبد خرید</span></a>
                                    @if ($product->is_liked_by_auth_user())
                                        <a href="{{route('dis.like',['id'=>$product->id])}}"
                                           class="add-card"><i
                                                class="fa fa-heart"
                                                style="color: red"></i><span> {{$product->like()->get()->count()}}</span></a>

                                    @else
                                        <a href="{{route('like',['id'=>$product->id])}}"
                                           class="add-card"><i
                                                class="flaticon-heart"
                                                style="color: red"></i><span> {{$product->like()->get()->count()}}</span></a>

                                    @endif
                                </div>
                            </div>
                            <div class="pi-text" align="right" dir="rtl">
                                <p>{{$product->name}}
                                    @if ($product->existence == 0)
                                        <span class="alert-danger">(موجود نیست)</span>
                                    @endif
                                </p>
                                <h6>{{$product->price}} تومان </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center pt-5">
                <a href="{{route('allProduct')}}" class="site-btn sb-line sb-dark">مشاهده بیشتر</a>
            </div>
        </div>
    </section>
@endsection
