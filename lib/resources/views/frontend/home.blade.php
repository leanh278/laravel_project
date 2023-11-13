<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{asset('public/frontend')}}/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
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
                      <li><a class="menu-a" href="{{asset('/cartmenu')}}"><p style="margin-right: 7px;">Giỏ hàng:</p>
                      <p>(
                                @if(Session::has("Cart") != null)
                                    <p id="total-quanty-show2" > {{Session::get('Cart')->totalQuanty}}</p>
                                @else
                                    <p id="total-quanty-show2" > 0</p>
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

                <div class=" header_wrapper-nav">
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
                        <div class="accordion-body header_wrapper-login-cart-nav ">
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


                            
                        </div>
                    </div>
                </div>
            </div>
        
        </div>       
</div>

    <div id="content">
        <div class="content_page">
            <div class="content_page-header">
                Chúng tôi sẽ làm tất cả<p>để mang lại những gì tốt nhất</p>
            </div>

            <a href="{{asset('/')}}" class="content_page-logo">
                <img src="assets/img/logo.png" alt="">
            </a>

            <div class="content_page-text">
                Tất cả các sản phẩm của chúng tôi đều được thử nghiệm phù hợp với trẻ theo tiêu chuẩn Châu Âu
            </div>

            <div class="content_page-button">
                <a href="{{asset('/menu')}}" class="content_page-button-product">
                    <i class='bx bxs-store'></i>
                    Luớt Shop ngay
                </a>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 content_page-button-search" action="{{asset('search/')}}">
                    <i class='bx bx-search-alt-2'></i>
                    <input type="text" name="result" class=" content_page-input-search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                </form>
                
            </div>
                    
                </a>
            <div class="content_page-social-text">
                Các trang liên kết
            </div>

            <div class="content_page-social-logo">
                <a href="https://www.facebook.com/"><i class='bx bxl-facebook-circle' ></i></a>
                <a href="https://www.instagram.com/bigstuffed/"><i class='bx bxl-instagram-alt' ></i></a>
                <a href="https://twitter.com/?lang=vi"><i class='bx bxl-twitter' ></i></a>
                <a href="https://www.reddit.com/"><i class='bx bxl-reddit'></i></a>
                <a href="https://www.youtube.com/"><i class='bx bxl-youtube' ></i></a>
            </div>
        </div>
        <div class="content_page1">
            
        </div>
        <div class="content_product">
            <div class="content_product-slider">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner carousel-innerr" style="border-radius: 10px; margin: auto;">
                  <div class="carousel-item active content_product-slider-img">
                    <a href="http://localhost:8888/doan/detail5/ca-voi.html"><img src="http://localhost:8888/doan/lib/storage/app/avatar/W-01-1_540x.webp" class="d-block " alt=""></a>
                    <div class="content_product-slider-name">
                        Cá Voi
                    </div>
                    <div class="content_product-slider-bot">
                        <div class="content_product-slider-icon">
                            <a href="http://localhost:8888/doan/detail5/ca-voi.html"><i class='bx bx-link-external'></i></a>
                            <a onclick="AddCart(5)" href="javascript:"><i class='bx bx-cart-alt'></i></a>
                            
                        </div>

                        <div class="content_product-slider-pice">
                            3.352.000₫
                        </div>
                    </div>
                    
                  </div>
                  @foreach($slider as $item)
                  <div class="carousel-item content_product-slider-img">
                    <a href="{{asset('detail'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="d-block " alt=""></a>
                    <div class="content_product-slider-name">
                    {{$item->prod_name}}
                    </div>
                    <div class="content_product-slider-bot">
                        <div class="content_product-slider-icon">
                            <a href="{{asset('detail'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><i class='bx bx-link-external'></i></a>
                            @if($item->stock_quantity == 0)
                            <div class="content_product-soldout">Sold Out</div>
                            @else
                            <a onclick="AddCart({{$item->prod_id}})" href="javascript:"><i class='bx bx-cart-alt'></i></a>
                            @endif
                        </div>

                        <div class="content_product-slider-pice">
                        {{number_format($item->prod_price,0,',','.')}}₫
                        </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev content_product-slider-button" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next content_product-slider-button" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            

            <div class="content_product-list">
                <div class="content_product-list-header">
                    <a href="{{asset('/new')}}">New Product</a> 

                    <a href="{{asset('/new')}}" class="content_product-list-detail">
                        Xem tất cả
                    </a>
                </div>
                @foreach($news as $item)
                <div class="content_product-list-nav">
                    <div class="content_product-list-item">
                        <a href="{{asset('detail'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="content_product-list-item-img">
                            <img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" alt="">
                        </a>
                        <div class="content_product-list-item-info">
                            <a href="{{asset('detail'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="content_product-list-item-name">
                                 {{$item->prod_name}}
                            </a>
                            <div class="content_product-list-item-pirce">
                                 {{number_format($item->prod_price,0,',','.')}}₫
                            </div>
                        </div>

                       
                            @if($item->stock_quantity == 0)
                            <div class="content_product-soldout-item">Sold Out</div>
                            @else
                            <div class="content_product-list-item-icon">
                            <a onclick="AddCart({{$item->prod_id}})" href="javascript:">
                            <i class='bx bx-cart-alt'></i>
                            </a>
                            </div>
                            @endif
                        
                    </div>

                </div>
                @endforeach
            </div>
            @foreach($categorie as $cate)
            <div class="content_product-list">
                <div class="content_product-list-header">
                    <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a> 

                    <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" class="content_product-list-detail">
                        Xem tất cả
                    </a>
                </div>
                @foreach($product as $prod)
                @if($prod->prod_cate == $cate->cate_id)
                <div class="content_product-list-nav">
                    <div class="content_product-list-item">
                        <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="content_product-list-item-img">
                            <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
                        </a>

                        <div class="content_product-list-item-info">
                            <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="content_product-list-item-name">
                             {{$prod->prod_name}} 
                            </a>
                            <div class="content_product-list-item-pirce">
                            {{number_format($prod->prod_price,0,',','.')}}₫
                            </div>
                        </div>
                        @if($prod->stock_quantity == 0)
                            <div class="content_product-soldout-item">Sold Out</div>
                            @else
                            <div class="content_product-list-item-icon">
                            <a onclick="AddCart({{$prod->prod_id}})" href="javascript:"><i class='bx bx-cart-alt'></i></a>
                        </div>
                            @endif
                        <!-- <div class="content_product-list-item-icon">
                            <a onclick="AddCart({{$prod->prod_id}})" href="javascript:"><i class='bx bx-cart-alt'></i></a>
                        </div> -->
                    </div>

                </div>
                @endif
            @endforeach  

               
            </div>          
            @endforeach  

        </div>

        <div class="content_info">

            <div class="content_info-top">
                <div class="content_info-left">
                    @if(Auth::check())
                        <div class="content_info-user">
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
                        <div class="content_info-text">
                        <div class="content_info-text-item" style="width: 40%;">
                            <div class="content_info-text-item-header">
                                Số đơn
                            </div>
                            <p>{{$count}}</p>
                        </div>

                        <div class="content_info-text-item" style="width: 60%;">
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

                    
                </div>
                 
                
                <div class="content_info-right">
                    <div class="content_info-contact">
                        <div class="content_info-contact-header">
                            Liên lạc
                        </div>
						@include('errors.note')
                        <form role="form" method="post">      
                            <input name="name" type="text" class="feedback-input" placeholder="Name" />   
                            <input name="email" type="text" class="feedback-input" placeholder="Email" />
                            <textarea style="min-height: 85px; max-height: 370px;" name="text" class="feedback-input" placeholder="Comment"></textarea>
                            <input  type="submit" value="SUBMIT"/>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="content-info-bot">
                <div class="content_info-cart">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button style="background-color: #FEFBF3;" class="accordion-button collapsed content_info-cart-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                              Giỏ hàng
                              <span>(
                                @if(Session::has("Cart") != null)
                                    <span id="total-quanty-show1" >{{Session::get('Cart')->totalQuanty}}</span>
                                @else
                                    <span id="total-quanty-show1" >0</span>
                                @endif 
                                sản phẩm)</span>
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="background-color: #FEFBF3;">
                                <div class="content_info-cart-text">
                                    <div class="content_info-cart-text-name">
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
                          </div>
                        </div>
                        
                    
                      </div>
                </div>
            </div>
            <div class="content-info-img">
                <img src="img/barder.webp" class="img-fluid content-info-img-img" alt="Responsive image">
                <div class="content-info-img-text">
                    <h1>ĐƯỢC THIẾT KẾ ĐỘC QUYỀN Ở FRANCE 🇫🇷</h1>
                    <p>100% HandMade in EUROPE</p>
                    <a href="{{asset('/about')}}"><span class="content-info-img-text-span">Tìm hiểu thêm</span> </a>
                </div>
            </div>                   
            <div class="content-info-bandroll">
                <div class="content-info-bandroll-left">
                    <div class="content-info-bandroll-item">
                        <div class="content-info-bandroll-item-header">
                            🤗 BẢO ĐẢM SỰ HÀI LÒNG
                        </div>
                        <div class="content-info-bandroll-item-text">
                            Chúng tôi luôn quan tâm đến Khách hàng của chúng tôi. Nếu vì bất kỳ lý do gì bạn không hài lòng với BigStuffed. Chúng tôi sẽ hoàn lại tiền đầy đủ :)
                        </div>
                    </div>

                    <div class="content-info-bandroll-item">
                        <div class="content-info-bandroll-item-header">
                            👀 VUI CHƠI VÀ AN TOÀN
                        </div>
                        <div class="content-info-bandroll-item-text">
                            Sản phẩm của chúng tôi đã được thử nghiệm để bảo đảm an toàn tuyệt đối với trẻ. Chúng tôi đảm bảo các đường may chắc chắn và vải chất lượng cao để BigStuffed của bạn cũng như các bé
                        </div>
                    </div>
                </div>
                <div class="content-info-bandroll-right">
                    <div class="content-info-bandroll-item">
                        <div class="content-info-bandroll-item-header">
                             💪 KHÔNG NGỪNG PHÁT TRIỂN
                        </div>
                        <div class="content-info-bandroll-item-text">
                            BigStuffeds không chỉ là thú nhồi bông. Chúng tôi đang ngày càng cố gắng trở thành đối tác trọn đời để học cách chia sẻ, quan tâm và thư giãn với những đứa trẻ.
                        </div>
                    </div>

                    <div class="content-info-bandroll-item">
                        <div class="content-info-bandroll-item-header">
                            🌟 THIẾT KẾ ĐỘC QUYỀN
                        </div>
                        <div class="content-info-bandroll-item-text">
                            Với vẻ ngoài độc đáo nhưng đôi mắt khác biệt, thú nhồi bông BigStuffed được thiết kế để trở nên khác biệt và độc đáo, toát lên cảm xúc và tình bạn thân thiết.
                        </div>
                    </div>
                       
                        
                </div>
            </div>
         
            <div class="footer"> 
    <div class="content-info-lager">
                <div class="content-info-lager-content">
                    <div class="content-info-lager-item">
                        <div class="content-info-lager-item-img">
                            <img src="img/lager.png" alt="">
                        </div>
                        <div class="content-info-lager-item-header">
                            Món quà tuyệt vời
                        </div>
                        <div class="content-info-lager-item-text">
                        Nổi bật với món quà đáng yêu nhất Điều đó sẽ tồn tại mãi mãi.
                        </div>
                    </div>
                    <div class="content-info-lager-item">
                        <div class="content-info-lager-item-img">
                            <img src="img/lager1.png" alt="">
                        </div>
                        <div class="content-info-lager-item-header">
                            Gợi nên cảm xúc
                        </div>
                        <div class="content-info-lager-item-text">
                        Được sản xuất để mang lại tình yêu thương cho mọi người.
                        </div>
                    </div>
                    <div class="content-info-lager-item">
                        <div class="content-info-lager-item-img">
                            <img src="img/lager2.webp" alt="">
                        </div>
                        <div class="content-info-lager-item-header">
                            Mềm mại như mây
                        </div>
                        <div class="content-info-lager-item-text">
                        Vải được lựa chọn đặc biệt cho sự mềm mại và sức đề kháng của chúng.
                        </div>
                    </div>
                    <div class="content-info-lager-item">
                        <div class="content-info-lager-item-img">
                            <img src="img/lager4.png" alt="">
                        </div>
                        <div class="content-info-lager-item-header">
                            Thân thiện với trẻ
                        </div>
                        <div class="content-info-lager-item-text">
                        Tất cả các sản phẩm của chúng tôi đều được kiểm tra theo tiêu chuẩn cao nhất của châu Âu
                        </div>
                    </div>
                </div>

                <div class="content-info-sub">
                    <div class="content-info-sub-header">
                        ĐỂ NHẬN NHỮNG THÔNG TIN SẮP TỚI!
                    </div>
                    <div class="content-info-sub-header-text">
                        Hãy Đăng Ký Ngay
                    </div>
                    <form role="form" method="post" action="{{asset('/sigin')}}"> 
                    <div class="content-info-sub-button">
                        <input name="emailsigin" type="email" class="feedback-input input-sub" placeholder="Hãy nhập email của bạn">
                        <input type="submit" class="content_info-user-signin content-info-sub-button-a" value="Đăng ký"/>
                        {{csrf_field()}}
                    </div>
                    </form>
                </div>

            
           </div>
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
            
            $.ajax({
                url:'http://localhost:8888/doan/nextcart'+id,
                type:'GET',
            }).done(function(response){
                RenderCart(response);
            }); 
        }

        function PrevCart(id){
            
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
            $("#total-quanty-show2").text($('#total-quanty-cart2').val());   
        }
    </script>
</body>
</html>