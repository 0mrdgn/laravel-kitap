<!DOCTYPE html>
<html>
<head>

    <title>K & K </title>
    <link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="{{asset("js/jquery-1.11.0.min.js")}}"></script>
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Kitap  & Kalem " />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--start-menu-->
    <script src="{{asset("js/simpleCart.min.js")}}"> </script>
    <link href="{{asset("css/memenu.css")}}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{asset("js/memenu.js")}}"></script>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
    <!--dropdown-->
    <script src="{{asset("js/jquery.easydropdown.js")}}"></script>
</head>

<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="box">
                            <a href="" style="color: white;">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                        </div>
                        <div class="box">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Çıkış Yap</button>
                            </form>
                        </div>
                    @endif

                    @guest
                        <div class="box">
                            <select tabindex="4" class="dropdown">
                                <option value="" class="label">Dil Seçimi:</option>
                                <option value="1">TR</option>
                                <option value="2">EN</option>
                                <option value="3">DE</option>
                            </select>
                        </div>
                    <div class="box">
                        <a href="{{route("login")}}" style="color: white;">Giriş Yap</a>
                    </div>
                    <div class="box">
                        <a href="{{url("/register")}}" style="color: white;">Kayıt Ol</a>
                    </div>
                    @endguest

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="{{route("eklenen.index")}}">
                        <div class="total">
                            <span style="font-size: 13px;">{{\App\Helper\sepetHelper::totalPrice()}} TL</span></div>
                        <img src="{{asset("images/cart-1.png")}}" alt="" />
                    </a>
                    <p><a href="{{route("eklenen.flush")}}" class="simpleCart_empty">Sepeti Temizle</a></p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="{{route("index")}}"><h1> <strong> K & K</strong> </h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="{{route("index")}}">Anasayfa </a></li>

                        @foreach(\App\Kategoriler::getRootCategory() as $key=>$value)
                             
                            <li class="grid">
                                <a href="{{route("cat", ["selflink"=>$value["selflink"]])}}"> {{$value["name"]}} ({{$value->totalProducts()}}) </a>
                                    @include("front.cat.root", $value)
                            </li>

                        @endforeach

                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route("search")}}">
                        <input type="text" name="q" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->

@yield("content")

<body>
<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Bizi takip edebilirsiniz...</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Bilgiler</h3>
                <ul>
                    <li><a href="#"><p>Mağazalarımız</p></a></li>
                    <li><a href="#"><p>Çok Satanlar</p></a></li>
                    <li><a href="#"><p>Yeni Ürünler</p></a></li>
                </ul>
            </div>

            <div class="col-md-3 infor-left">
                <h3>İletişim Bilgiler</h3>
                <h4>K & K , QR Code Uygulaması.</h4>
                <p><a href="https://www.linkedin.com/in/canyagmurrr/">www.linkedin.com</a></p>
                <p><a href="https://github.com/YagmurrrCan/Project1">github.com/YagmurrrCan</a></p>
                <p><a href="mailto:example@email.com">yagmurrrcan16@gmail.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer">
                <p>© 2021 K & K. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->
</body>

