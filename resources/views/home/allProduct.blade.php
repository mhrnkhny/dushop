@extends('layouts.site')
@section('title','همه محصولات')
@section('content')

    <!-- Category section -->
    <section class="category-section spad">
        <div class="container">
            <div class="row" dir="rtl" align="right">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="filter-widget">
                        <h2 class="fw-title">دسته بندی ها</h2>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">دسته بندی بر اساس </h2>
                        <div class="price-range-wrap">
                            <h4>قیمت</h4>
                            <div
                                class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="100" data-max="1000000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"
                                     style="left: 0%; width: 100%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                      style="left: 0%;">
								</span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                      style="left: 100%;">
								</span>
                            </div>
                            <div class="range-slider">
                                <form action="" method="">
                                    <div class="price-input">
                                        <input name="minamount" value="{{request('minamount')}}" type="text"
                                               id="minamount">
                                        <input name="maxamount" value="{{request('maxamount')}}" type="text"
                                               id="maxamount">
                                        <button class="site-btn"><b> فیلتر </b><i class="fa fa-filter"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="filter-widget mb-0">
                            <h2 class="fw-title">رنگ</h2>
                            <div class="fw-color-choose">
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('red')}}" id="cs-red">
                                    <label class="cs-red" for="cs-red">
                                        <span>(قرمز)</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('blue')}}" id="cs-blue">
                                    <label class="cs-blue" for="cs-blue">
                                        <span>(آبی)</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('purple')}}" id="cs-purple">
                                    <label class="cs-purple" for="cs-purple">
                                        <span>(بنفش)</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('green')}}" id="green-color">
                                    <label class="cs-green" for="green-color">
                                        <span>(سبز)</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('yellow')}}" id="cs-yellow">
                                    <label class="cs-yellow" for="cs-yellow">
                                        <span>(زرد)</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cl" value="{{request('black')}}" id="cs-black" checked="">
                                    <label class="cs-black" for="cs-black">
                                        <span>(مشکی)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget mb-0">
                            <h2 class="fw-title">سایز</h2>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" name="gcl" value="{{request('XS')}}" id="xs-size">
                                    <label for="xs-size">XS</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="f" value="{{request('S')}}" id="s-size">
                                    <label for="s-size">S</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="cdl" id="m-size" value="{{request('M')}}" checked="">
                                    <label for="m-size">M</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="csl"  value="{{request('L')}}" id="l-size">
                                    <label for="l-size">L</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="chl"  value="{{request('XL')}}" id="xl-size">
                                    <label for="xl-size">XL</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="cl"  value="{{request('XXL')}}" id="xxl-size">
                                    <label for="xxl-size">XXL</label>
                                </div>
                            </div>
                        </div>
                        <div class="sc-item" align="center">
                            <button  class="site-btn"><b> {{__('فیلتر')}} </b><i class="fa fa-filter"></i></button>
                        </div>

                    </form>
                    <br>

                </div>

                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <div class="tag-sale">حراج</div>
                                        <a href="/home/{{$product->slug}}" style="color: black"><img src="{{url($product->image)}}" alt=""></a>
                                        <div class="pi-links">
                                            <a onclick="add_cart({{$product->id}})" href="{{route('allProduct')}}"
                                               class="add-card"><i class="flaticon-bag" style="color: green"></i><span>افزودن به سبد خرید</span></a>

                                            <a href="" class="add-card"><i class="flaticon-heart"
                                                                           style="color: red"></i><span> {{\App\Like::where('product_id',$product->id)->count()}}</span></a>
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


                        <div class="text-center w-100 pt-3">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
