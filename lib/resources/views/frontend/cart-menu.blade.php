<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{asset('public/frontend')}}/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style-css.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="assets/bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
</head>
<body>
<div id="header">
            <div class="header_nav">
                <div class="header_wrapper container">
                <nav role="navigation">
                    <div id="menuToggle">
                      <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                     <ul id="menu">
                      <li><a class="menu-a" href="{{asset('/')}}">Home</a></li>
                      <li><a class="menu-a" href="{{asset('/menu')}}">Sản phẩm</a></li>
                      <li><a class="menu-a" href="{{asset('/about')}}">Thông tin</a></li>
                      <li><a class="menu-a" href="{{asset('/about')}}">Thông tin</a></li>
                      <li><a class="menu-a" style ="display:flex;" href="{{asset('/cartmenu')}}"><p style="margin-right: 7px;">Giỏ hàng:</p>
                      <p>(
                                @if(Session::has("Cart") != null)
                                    <p id="total-quanty-show2" >{{Session::get('Cart')->totalQuanty}}</p>
                                @else
                                    <p id="total-quanty-show2" >0</p>
                                @endif 
                                sản phẩm)
                      </p>
                      </a></li>

                       @if(Auth::check())
                        <div class="content_info-user" style = "margin-top: 10px;">
                            <div class="content_info-user-header">
                                Tài khoản của tôi
                            </div>

                            <a href="{{asset('/user')}}" class="content_info-user-img">
                            @if(Auth::user()->cus_img == NULL)
                                <img src="http://localhost:8888/doan/public/backend/img/user.png" alt="">
                            @else
                            <img src="{{asset('lib/storage/app/avataruser/'.Auth::user()->cus_img)}}" alt="">
                            @endif
                            </a>

                            <div class="content_info-user-name">
                                {{Auth::user()->cus_name}}
                            </div>

                            <div class="content_info-user-icon">
                                <a href="{{asset('/user')}}"><i class='bx bx-envelope'></i><div>{{Auth::user()->cus_email}}</div></a>
                                <a href="{{asset('/user')}}"><i class='bx bx-info-circle'></i></a>
                                <a href="{{asset('logout')}}"><i class='bx bx-log-out' ></i></a>

                            </div>
                        </div>  
                        <div class="content_info-text">
                        <div class="content_info-text-item" style="width: 40%;">
                            <div class="content_info-text-item-header">
                                Số đơn
                            </div>
                            <p>{{$count}}</p>
                        </div>

                        <div class="content_info-text-item" style="width: 63%;">
                            <div class="content_info-text-item-header">
                                Tổng tiền
                            </div>
                            <p >{{number_format($sum,0,',','.')}}₫</p>
                        </div>

                    </div>                                     
                        @else
                        <div class=" content_info-user">
                            <a href="{{asset('/login')}}" class="content_info-user-login">Đăng nhập</a>
                            <a href="{{asset('/register')}}" class="content_info-user-signin">Đăng ký</a>
                        </div>
                        @endif

                    
                    </ul>
                   </div>
                  </nav>

                <div class="header_wrapper-logo">
                    <a href="{{asset('/')}}" class="header_wrapper-logo-link">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                </div>

                <div class="header_wrapper-nav">
                    <div class="header_wrapper-nav-subnav">
                        <a href="{{asset('/')}}" class="header_wrapper-nav-subnav-name">Home</a> 
                    </div>

                    <div class="header_wrapper-nav-hover header_wrapper-nav-subnav">
                        <a href="{{asset('/menu')}}" class="header_wrapper-nav-subnav-name ">Danh Mục</a> 
                        <div class="header_wrapper-nav-subnav-container">
                            @foreach($categories as $cate)
                            <div class="header_wrapper-nav-subnav-lits">
                                <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" class="header_wrapper-nav-subnav-lits-name">{{$cate->cate_name}}</a> 
                                <ul>
                                @foreach($product as $prod)
                                    @if($prod->prod_cate == $cate->cate_id)
                                        <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="header_wrapper-nav-subnav-item">
                                            <span class="header_wrapper-nav-subnav-item-span">{{$prod->prod_name}}</span>  
                                            <div class="header_wrapper-nav-subnav-item-img">
                                                <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
    
                                                <div  class="header_wrapper-nav-subnav-item-list">
                                                    <h1>{{$prod->prod_name}} </h1>
                                                    <span>
                                                    {!!$prod->prod_description!!}
                                                    </span>
                                                </div>
                                                <div class="content_product-slider-pice" style="text-align: end; line-height: 25px;">
                                                {{number_format($prod->prod_price,0,',','.')}}₫
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @endforeach  
                                </ul>
                            </div>
                            @endforeach  
    
                        </div>  
                    </div>

                    <div class="header_wrapper-nav-subnav">
                        <a href="{{asset('/about')}}" class="header_wrapper-nav-subnav-name">Thông Tin</a> 
                        
                    </div>
                </div>

                <div class="header_wrapper-login">
                <div  class="header_wrapper-login-admin">
                        <i class='bx bx-user'></i>
                        @if(Auth::check())
                        <div class=" header_wrapper-login-admin-user">
                            <div class="content_info-user-header">
                                Tài khoản của tôi
                            </div>

                            <a href="{{asset('/user')}}" class="content_info-user-img">
                            @if(Auth::user()->cus_img == NULL)
                                <img src="http://localhost:8888/doan/public/backend/img/user.png" alt="">
                            @else
                            <img src="{{asset('lib/storage/app/avataruser/'.Auth::user()->cus_img)}}" alt="">
                            @endif
                            </a>

                            <div class="content_info-user-name">
                                {{Auth::user()->cus_name}}
                            </div>

                            <div class="content_info-user-icon">
                                <a href="{{asset('/user')}}"><i class='bx bx-envelope'></i><span>{{Auth::user()->cus_email}}</span></a>
                                <a href="{{asset('/user')}}"><i class='bx bx-info-circle'></i></a>
                                <a href="{{asset('logout')}}"><i class='bx bx-log-out' ></i></a>

                            </div>
                        </div>                                
                        @else
                        <div class=" header_wrapper-login-admin-user">
                            <a href="{{asset('/login')}}" class="content_info-user-login">Đăng nhập</a>
                            <a href="{{asset('/register')}}" class="content_info-user-signin">Đăng ký</a>
                        </div>
                        @endif
                    </div>
                    <div class="header_wrapper-login-cart">
                        <i class='bx bx-shopping-bag' ></i>
                        @if(Session::has("Cart") != null)
                            <span id="total-quanty-show" class="header_wrapper-login-cart-quanity">{{Session::get('Cart')->totalQuanty}}</span>
                        @else
                            <span id="total-quanty-show" class="header_wrapper-login-cart-quanity">0</span>
                        @endif
                        
                    </div>
                </div>
            </div>
        
        </div>       
</div>

<div id="list">
    <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <p>Giỏ hàng</p>
            </div>
    </div>
<style>
    .content_info-car-sum-button{
        display: none;
    }
</style>
    <div class="accordion-body  container">
            <div class="content_info-cart-text">
                <div class="content_info-cart-text-name header_wrapper-login-cart-nav-name ">
                    Sản phẩm
                </div>
                <div class="content_info-cart-text-pirce">
                    Giá
                </div>
                <div class="content_info-cart-text-quantity">
                    Số lượng 
                </div>
                <div class="content_info-cart-text-sum">
                    Tổng tiền
                </div>
                <div class="content_info-cart-text-delete">
                    Xóa
                </div>
            </div>

            <div class="content_info-cart-list">
                <div class ="change-item-cart" >
                <div class ="change-item-cart-scroll">
                    @if(Session::has("Cart") != null)
                    @foreach(Session::get("Cart")->products as $item)
                    <div class="content_info-cart-list-item">
                        <div class="content_info-cart-list-item-product">
                            <a href="{{asset('detail'.$item['productInfo']->prod_id.'/'.$item['productInfo']->prod_slug.'.html')}}" class="content_info-cart-list-item-img">
                                <img src="{{asset('lib/storage/app/avatar/'.$item['productInfo']->prod_img)}}" alt="">
                            </a>
                            <div class="content_info-cart-list-item-name">
                                {{$item['productInfo']->prod_name}}
                            </div>
                        </div>

                        <div class="content_info-cart-list-item-pirce">
                            {{number_format($item['productInfo']->prod_price,0,',','.')}}₫

                        </div>
                        <div class="content_info-cart-list-item-quantity header_wrapper-login-cart-nav-quantity">
                            <div   onclick = "PrevCart({{$item['productInfo']->prod_id}});" class="content_info-cart-list-item-quantity-prev">
                                <i class='bx bx-chevron-left'></i>
                            </div>

                            <span id="quanty-item-{{$item['productInfo']->prod_id}}">{{$item['quanty']}}</span>
                            <div   onclick = "NextCart({{$item['productInfo']->prod_id}});" class="content_info-cart-list-item-quantity-next">
                                <i class='bx bx-chevron-right'></i>
                            </div>

                        </div>

                        <div class="content_info-cart-list-item-sum">
                        {{number_format($item['sumprice'],0,',','.')}}₫
                            
                        </div>

                        <div class="content_info-cart-list-item-delete">
                            <i data-id="{{$item['productInfo']->prod_id}}" class='bx bx-trash'></i>
                        </div>
                    </div>
                    @endforeach
                    </div>
                                        <div class="content_info-car-sum">
                                            <div class="content_info-car-sum-pirce">
                                                <span>Tổng thanh toán:</span>
                                                <div class="content_info-car-sum-monney">
                                                    {{number_format(Session::get("Cart")->totalPrice,0,',','.')}}₫
                                                </div>
                                            </div>

                                            <a href="{{asset('/cartmenu')}}" class="content_info-car-sum-button">
                                                Xem giỏ hàng
                                            </a>
                                        </div>
                                        @endif
                </div>
                </div>
                <a href="{{asset('/pay')}}" class=" content_info-car-sum-button-cart ">
                    Thanh Toán
                </a>
            </div>


        
    </div>



</div>


<div id="footer">
        <div class="footer_nav container">
            <div class="footer-border"></div>

            <div class="footer_help">
                <div class="footer_help-header">
                    Trợ giúp
                </div>
                <div class="footer_help-list">
                        <a href="{{asset('/faq')}}">FAQ</a>
                        <a href="{{asset('/contact')}}">Liên Lạc</a>
                        <a href="{{asset('/about')}}">Thông Tin</a>
                    </div>
                
            </div>
            <div class="footer_contact">
                <div class="footer_contact-header">
                    Liên hệ
                </div>
                <div class="footer_contact-list">
                    <div class="footer_contact-locator">
                        <i class='bx bx-map'></i>
                        10 rue de Crussol, 75011 - Paris. France
                </div>

                <div class="footer_contact-email">
                    <i class='bx bx-envelope' ></i>
                    BigStuffeds@gmail.com
                </div>

                <div class="footer_contact-phone">
                    <i class='bx bx-phone'></i>
                    1234567890
                </div>
                </div>
                
            </div>

           

            <div class="footer_last">
                <p>© 2023 <a href="{{asset('/')}}">BigStuffed</a>.</p>
            </div>
        </div>
       
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        function AddCart(id){
            $.ajax({
                url:'http://localhost:8888/doan/addcart'+id,
                type:'GET',
            }).done(function(response){
                RenderCart(response);
                alertify.success('Đã thêm sản phẩm');
            }); 
        }

        $(".change-item-cart").on("click",".content_info-cart-list-item-delete i", function(){
                $.ajax({
                url:'http://localhost:8888/doan/deletecart'+$(this).data("id"),
                type:'GET',
            }).done(function(response){
                RenderCart(response);
                alertify.error('Đã xóa sản phẩm');
            }); 
        });
     
        function NextCart(id){
            console.log(id);
            $.ajax({
                url:'http://localhost:8888/doan/nextcart'+id,
                type:'GET',
            }).done(function(response){
                RenderCart(response);
            }); 
        }

        function PrevCart(id){
            console.log(id);
            $.ajax({
                url:'http://localhost:8888/doan/prevcart'+id,
                type:'GET',
            }).done(function(response){
                RenderCart(response);
            }); 
        }

        function RenderCart(response){
            $(".change-item-cart").empty();
            $(".change-item-cart").html(response);
            $("#total-quanty-show").text($('#total-quanty-cart').val());   
            $("#total-quanty-show1").text($('#total-quanty-cart1').val());   
        }
    </script>
    </body>
</html> 

