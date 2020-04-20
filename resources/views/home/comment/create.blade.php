@extends('layouts.site')
@section('title','ارسال پیام')
@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row" align="right" dir="rtl">
                <div class="col-md-3"></div>
                <div class="col-lg-6 contact-info">
                    <h3>سوالات خود را با ما در میان بگذارید</h3>
                    <div class="contact-social">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-telegram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <form class="contact-form" method="post" action="{{route('store.comment')}}">
                        @csrf
                        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                        <input type="text" name="title" placeholder="موضوع خود را وارد کنید">
                        <textarea placeholder="متن خود را وارد کنید" name="message"></textarea>
                        <button class="site-btn btn-block"><b>ارسال</b><i class="fa fa-send"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout-section spad">
        <div class="container">
            <div class="row" align="right" dir="rtl">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="checkout-cart">
                        <h3>سوالات پرتکرار</h3>

                            <ul class="product-list">
                                @foreach ($comments as $comment)
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="pl-thumb"><img src="../image/img/cart/1.jpg" alt=""
                                                                           class="img-circle img-thumbnail "></div>
                                            </div>
                                            <div class="col-md-3"><i class="fa fa-user"></i><h6>{{$comment->user->fullName()}}</h6>
                                            </div>
                                            <div class="col-md-3"><i class="fa fa-comment-o"></i><p>{{$comment->message}}</p>
                                            </div>
                                            <div class="col-md-2"><i class="fa fa-calendar-times"></i><p>{{jdate($comment->created_at)->format('G:i:s |  Y/m/d')}}</p>
                                            </div>
                                            <div class="col-md-1"><i class=""></i>
                                                <p>
                                                    {{now()->diffInDays($comment->created_at)}} روز پیش </p>
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
    <br><br>
@endsection
