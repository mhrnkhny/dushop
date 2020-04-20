@extends('layouts.site')
@section('title','محصول '. $products->name)
@section('css')
    <link rel="stylesheet" href="{{url('css/home/star-rating.min.css')}}"/>
@endsection
@section('content')

    <!-- product section -->
    <section class="product-section">
        <div class="container">
            <div class="back-link">
                <a href="{{route('allProduct')}}"><h6>&lt;&lt; رفتن به همه محصولات</h6></a>
            </div>
            <div class="row">


                <div class="col-lg-6 product-details" dir="rtl" align="right">
                    <h2 class="p-title">{{$products->name}}</h2>
                    @if ($coupons)
                        <h3 class="p-price">

                            {{$products->price}} تومان

                            @foreach($coupons as $coupon)
                                <label for="" class="alert alert-danger"> تخفیف {{$coupon->amount}} تومان </label>
                                <h6>
                                    قیمت برای شما :
                                    <label for="" class="alert alert-success"><b
                                            style="font-size: 25px">{{$products->price - $coupon->amount}} تومان </b>
                                    </label>
                                </h6>
                            @endforeach
                        </h3>
                    @endif
                    <br>
                    <h4 class="p-stock">در دسترس:
                        @if ($products->existence == 1)
                            <span>موجود است</span>
                        @else
                            <span>به اتمام رسیده</span>

                        @endif

                    </h4>
                    <div class="p-rating">
                        <form action="{{route('star')}}" method="POST">
                            @csrf
                            <div class="rating">
                                <input id="input-1" value="{{$products->userAverageRating}}" name="rate"
                                       class="rating rating-loading" data-min="0"
                                       data-max="5" data-step="1" data-size="s">
                                <button class="btn btn-outline-light" style="height: 30px;width: 60px; color: #ec105a">
                                    امتیازدهی
                                </button>
                                <input type="hidden" name="id" required="" value="{{ $products->id }}">

                            </div>
                        </form>

                    </div>

                    <div class="p-review">
                        <a href="" style="color: #f51167">سایز های موجود</a> |
                        @foreach($sizes as $size)
                            {{$size->sizeA}} -
                        @endforeach
                    </div>
                    <div class="p-review">
                        <a href="" style="color: #f51167">رنگ های موجود</a> |
                        @foreach($colors as $color)
                            {{$color->colorName}} -
                        @endforeach
                    </div>

                    <div class="quantity" dir="rtl" align="right">
                        <p>تعداد</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
                    @if ($products->existence == 1)
                        <a onclick="add_cart({{$products->id}})" href="{{route('cart')}}" class="site-btn">افزودن به سبد
                            خرید</a>

                    @else
                        <button disabled class="site-btn btn-danger"><i class="fa fa-warning">  این محصول به اتمام رسیده است </i></button>


                    @endif

                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">اطلاعات
                                </button>

                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="panel-body">
                                    <p>{!! $products->description !!}</p>

                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                        aria-expanded="false" aria-controls="collapse2">ویژگی های محصول
                                </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($products->property as $property)
                                            <li><p>{{$property->property_text}}</p></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="social-sharing">
                        <a href="" title="E_mail"><i class="fa fa-google-plus"></i></a>
                        <a href="" title="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="" title="telegram"><i class="fa fa-telegram"></i></a>
                        <a href="" title="instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-pic-zoom">
                        <img class="product-big-img" src="{{url($products->image)}}" alt="">
                    </div>
                    <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                        <div class="product-thumbs-track">
                            @foreach($galery as $gly)
                                <div class="pt " data-imgbigurl="{{url($gly->image)}}"><img
                                        src="{{url($gly->image)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    <!-- RELATED PRODUCTS section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title">
                <h2>محصولات مرتبط</h2>
            </div>
            <div class="product-slider owl-carousel">
                @foreach($products2 as $product)
                    <div class="product-item">
                        <div class="pi-pic">
                            @if ($product->image)
                                <img src="{{url($product->image)}}" alt="">
                            @else
                                <img src="{{url('image/img/product/5.png')}}" alt="">
                            @endif
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag" style="color: green"></i><span>افزودن به سبد خرید</span></a>
                                @if ($product->is_liked_by_auth_user())
                                    <a href="{{route('dis.like',['id'=>$product->id])}}"
                                       class="add-card"><i
                                            class="fa fa-heart"
                                            style="color: red"></i><span> {{\App\Like::where('product_id',$product->id)->count()}}</span></a>

                                @else
                                    <a href="{{route('like',['id'=>$product->id])}}"
                                       class="add-card"><i
                                            class="flaticon-heart"
                                            style="color: red"></i><span> {{\App\Like::where('product_id',$product->id)->count()}}</span></a>

                                @endif
                            </div>
                        </div>
                        <div class="pi-text" align="right" dir="rtl">
                            <p>{{$product->name}}
                                @if ($product->existence == 0)
                                    <span class="alert-danger">(موجود نیست)</span>
                                @endif
                            </p>
                            <h6> {{$product->price}} تومان </h6>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- RELATED PRODUCTS section end -->
    @if (auth()->check())
        <section class="contact-section">
            <div class="container">
                <div class="row" align="right" dir="rtl">
                    <div class="col-lg-6 contact-info">
                        <form class="contact-form" method="post" action="{{route('store.comment')}}">
                            @csrf
                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                            <input type="hidden" value="{{$products->id}}" name="product_id">
                            <textarea name="message" placeholder="متن خود را وارد کنید"></textarea>
                            <button class="site-btn btn-block"><b>ارسال</b><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div align="center" class="alert alert-danger">برای ایجاد نظر ابتدا لاگین کنید</div>
    @endif
    <section class="checkout-section spad">
        <div class="container">
            <div class="row" align="right" dir="rtl">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="checkout-cart">
                        <h3>نظر کاربران به این محصول</h3>

                        <ul class="product-list">
                            @foreach ($comments as $comment)
                                <li>
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ($comment->user->image)
                                                <div class="pl-thumb"><img src="{{url($comment->user->image)}}" alt=""
                                                                           class="img-thumbnail "
                                                                           style="height: 55px;width: 20px;"></div>
                                            @else
                                                <div class="pl-thumb"><img src="../../image/img/cards.png" alt=""
                                                                           class="img-thumbnail "
                                                                           style="height: 55px;width: 20px;"></div>
                                            @endif
                                        </div>
                                        <div class="col-md-3"><i class="fa fa-user"></i>
                                            <h6>{{$comment->user->fullName()}}</h6>
                                        </div>
                                        <div class="col-md-3"><i class="fa fa-comment-o"></i>
                                            <p>{{$comment->message}}</p>
                                        </div>
                                        <div class="col-md-2"><i class="fa fa-clock-o"></i>
                                            <p>{{jdate($comment->created_at)->format('G:i:s |  Y/m/d')}}</p>
                                        </div>
                                        <div class="col-md-1">

                                            <p>{{now()->diffInDays($comment->created_at)}} روز پیش</p>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
<script type="text/javascript">
    $("#input-id").rating();
</script>
