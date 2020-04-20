<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>dushop | @section('title') صفحه اصلی @show</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <!-- Favicon -->
    <link href="{{url('image/2-512.png')}}" rel="shortcut icon"/>


    <!-- Stylesheets -->


    <link rel="stylesheet" href="{{url('css/home/bootstrap.min.css')}}"/>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/home/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/flaticon.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/slicknav.min.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/animate.css')}}"/>
    <link rel="stylesheet" href="{{url('css/home/style.css')}}"/>


<!--[if lt IE 9]>
    <script src="{{url('js/home/html5shiv.min.js')}}"></script>
    <script src="{{url('js/home/respond.min.js')}}"></script>
    <![endif]-->
    @yield('css')

</head>
<body>
<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row" align="right">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="{{route('homeIndex')}}" class="site-logo">
                        <img src="{{url('image/Capture6-removebg-preview.png')}}" alt=""
                             style="height: 50px; width: 300px;">
                    </a>
                </div>
                <div class="col-xl-7 col-lg-4" align="right">
                    <form class="header-search-form" method="get" href="">
                        <button><i class="flaticon-search" style="color: #ec105a"></i></button>
                        <input name="search" value="{{request('search')}}" dir="rtl" type="text"
                               placeholder="  جستجو از بین {{\App\Product::pluck('id')->count()}} محصول  ... ">
                    </form>
                </div>
                <div class="col-xl-3 col-lg-5">
                    <div class="user-panel">
                        @guest()
                            <div class="up-item">
                                <i class="flaticon-profile" style="color: #ec105a"></i>
                                <a href="{{route('login')}}"> ورود </a> | <a href="{{route('register')}}"> ثبت نام </a>
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag" style="color: #00b44e"></i>
                                    <span>0</span>
                                </div>
                                <a href="{{route('cart')}}">سبد خرید</a>
                            </div>
                        @endguest
                        @auth()
                            <div class="up-item">

                                <ul class="main-menu" align="right">

                                    <li align="right">
                                        @if(auth()->user()->image)
                                        <img src="{{url(auth()->user()->image)}}" alt="">
                                            @else
                                            <img src="{{url('image/img2/avatar.png')}}" alt="" style="width: 30px;height: 30px;" class="img-circle">

                                        @endif

                                        <a href="#"> {{auth()->user()->firstName}} </a>|
                                        <ul class="sub-menu">
                                            <li><a href="{{route('profile')}}"> <i class="flaticon-profile" ></i> پروفایل </a>|
                                            </li>
                                            <li><a href="{{route('logout')}}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                        class="flaticon-logout"></i>خروج </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag" style="color: #00b44e"></i>
                                    @if (auth()->check() && !empty(session()->get('carts')))
                                        <span>{{sizeof(session()->get('carts'))}}</span>
                                    @else
                                        <span>0</span>
                                    @endif
                                </div>
                                <a href="{{route('cart')}}">سبدخرید</a>
                            </div>
                    </div>

                </div>
            </div>


            @endauth


        </div>

    </div>

</header>
<!-- Header section end -->
<nav class="main-navbar">
    <div class="container">
        <!-- menu -->
        <div class="row" dir="rtl">
            <div class="col-md-8">
                <ul class="main-menu" align="right">
                    <li><a href="{{route('homeIndex')}}">خانه</a></li>
                    <li><a href="#">زنانه</a></li>
                    <li><a href="#">مردانه</a></li>
                    <li><a href="#">جواهرات
                            <span class="new">New</span>
                        </a></li>
                    <li align="right">
                        <a href="#">کفش ها</a>
                        <ul class="sub-menu">
                            <li><a href="#">ورزشی</a></li>
                            <li><a href="#">راحتی</a></li>
                            <li><a href="#">رسمی</a></li>
                            <li><a href="#">بوت</a></li>
                            <li><a href="#">لا انگشتی</a></li>
                        </ul>
                    </li>
                    <li><a href="#">محصولات</a>
                        <ul class="sub-menu " align="right">
                            <li><a href="{{route('allProduct')}}">همه محصولات</a></li>
                            <li><a href="{{route('cart')}}">سبدخرید</a></li>
                        </ul>
                    </li>
                    <li><a href="#">بیشتر</a>
                        <ul class="sub-menu " align="right">
                            <li><a href="{{route('show.comment')}}">سوالات</a></li>
                            <li><a href="./category.html">درباره ما</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">

                <ul class=" main-menu " align="left">

                    <li><a href="#">{{jdate()->now()->format('G:i:s |  Y/m/d')}}
                        </a></li>
                </ul>

            </div>

        </div>

    </div>
</nav>


@yield('content')


<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href="{{route('homeIndex')}}"><img src="{{url('image/Capture6-removebg-preview.png')}}" alt=""
                                                  style="height: 55px; width: 200px;"></a>
        </div>
        <div class="row" dir="rtl" align="center">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>درباره ما</h2>
                    <p>با سلام خدمت همراهان سایت دیو شاپ
                        همان طور که مارو دنبال میکنید میدانید که سایت ما به دنبال راحتی شما تلاش میکند
                        و تلاش میکند تا شما به راحتی به محصولاتی که دنبالشان هستین به راحترین روش به آن ها
                        برسید .
                        <a href="" STYLE="color:#ec105a ">بیشتر یخوانید...</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6" dir="ltr">
                <div class="footer-widget contact-widget">
                    <h2>اطلاعات بیشتر</h2>
                    <div class="con-info">
                        <span>C.</span>
                        <p>شرکت شما با مسئولیت محدود</p>
                    </div>
                    <div class="con-info">
                        <span>B.</span>
                        <p>آدرس : دامغان - میدان دانشگاه - دانشگاه دامعان </p>
                    </div>
                    <div class="con-info">
                        <span>T.</span>
                        <p>+23 554877</p>
                    </div>
                    <div class="con-info">
                        <span>E.</span>
                        <p>du.ac.ir</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6" dir="rtl" align="left">
                <div class="footer-widget about-widget">
                    <h2 align="center">سوالات </h2>
                    <ul align="left" dir="rtl">
                        <li><a href="">همکاران</a></li>
                        <li><a href="">وبلاگ نویسان</a></li>
                        <li><a href="">پشتیبانی</a></li>
                        <li><a href="">شرایط استفاده</a></li>
                        <li><a href="">مطبوعات</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="social-links-warp">
        <div class="container" align="center">
            <div class="social-links">
                <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                <a href="http://gmail.com/mehran.khani1997@gmail.com" class="google-plus"><i
                        class="fa fa-google-plus"></i><span>g+plus</span></a>
                <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                <a href="" class="telegram"><i class="fa fa-telegram"></i><span>telegram</span></a>
            </div>
        </div>
    </div>
</section>
<!-- Footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="{{url('js/home/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('js/home/bootstrap.min.js')}}"></script>
<script src="{{url('js/home/jquery.slicknav.min.js')}}"></script>
<script src="{{url('js/home/owl.carousel.min.js')}}"></script>
<script src="{{url('js/home/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('js/home/jquery.zoom.min.js')}}"></script>
<script src="{{url('js/home/jquery-ui.min.js')}}"></script>
<script src="{{url('js/home/main.js')}}"></script>
@yield('script')

<script src="{{url('js/home/star-rating.min.js')}}"></script>


<?php $url_add = Url('/cart/add')  ?>
<?php $url_plus = Url('/plus'); ?>
<?php $url_min = Url('/cart/min'); ?>
<?php $url_del = Url('/del_cart'); ?>


<script type="text/javascript">
    add_cart = function (id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= $url_add ?>',
            type: "POST",
            data: 'id=' + id,
            success: function (data) {
                $("#cart").html(data);
            }
        });
    };
    plus_cart = function (id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= $url_plus ?>',
            type: "POST",
            data: 'id=' + id,
            success: function (data) {
                alert('success');
                $("#special").remove();

            }
        });
    };
    min_cart = function (id) {
        /*
        var hol=$("span#"+id+"_span").text();
        var holl=parseInt(hol);
        var strin=String(holl-1);
        $("span#"+id+"_span").remove();
        var ssj="<span id=\" "+id+"_span\"> "+strin+"</span>";
        $("span#"+id+"_span_mother").append(ssj);
        */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= $url_min ?>',
            type: "POST",
            data: 'id=' + id,
            success: function (data) {
                $("#cart").html(data);
            }
        });
    };
    del_cart = function (id) {
        $("li#" + id).remove();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= $url_del ?>',
            type: "POST",
            data: 'id=' + id,
            success: function (data) {
                $("li#" + id).remove();
            }
        });
    };
</script>
<script src="{{url('js/sweetalert2.js')}}"></script>
@include('sweet::alert')

</body>
</html>

