@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<style>
  
  label{
    cursor:pointer;
    font-size: 30px;
    color:#FFD642;
    display:block;
    width: 40px;
    line-height:60px;
    text-align: center;
    float:left;
    transition: 0.5s;
  }
    
    label:hover{
      font-size:40px;
      color:#FFD642;
  
    }
    
    label:before{
      display: inline;
      width: auto;
      height: auto;
      line-height: normal;
      vertical-align: baseline;
      margin-top: 0;
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      text-decoration: inherit;
      -webkit-font-smoothing: antialiased;
      content: "\f005";
    }
input:checked + label ~label{
  &:before{
    content: "\f006";
  }
}

#wrapper{
  display: inline-block;
  &:hover{
    label{
      &:before{
        content: "\f005"; 
      }
      &:hover{
        &~label:before{
           content: "\f006";
        }
      }
    }
  }
}

@media (max-width: 1200px){
  .list_content-list-item-detail {
    display: none;
  }
}
@media (max-width: 992px){
  .list_content-list-item-detail{
        display: block;
    }
}
.paginate .flex-1{
            display: none;
        }
        .paginate svg{
            width: 20px;
            height: 20px;
        }
        .paginate p{
            display: none ;
        }
        .paginate{
            display: flex;
            justify-content: center;
            margin:15px 0;
        }
        .paginate .bg-white{
            background-color: #FEFBF3 !important;
            border-radius: 10px;
            margin: 0 10px;
            border: 1px #A5AAAF solid !important;
            padding: 10px 15px !important;
            font-size: 14px;
            display: inline-block;
        }
        .paginate .shadow-sm{
            box-shadow: unset !important;
        }
        .paginate .cursor-default{
            font-weight: 700;
            
        }
</style>
    <div id="detail">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <a href="{{asset('/menu')}}">Bộ sưu tầm</a>

                <span>></span>

                <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">Thú bông {{$cate->cate_name}}</a>
                <span>></span>
                <p>{{$item->prod_name}}</p>
            </div>
        </div>

        <div class="detail_content container">

            <div class="detail_content-body">
            <div class="detail_content-img">
                <div><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" alt=""></div>
                
            @foreach($img as $imgs)

                <div><img src="{{asset('lib/storage/app/img/'.$imgs->imgnames)}}" alt=""></div>

            @endforeach
            </div>
            <div class="detail_content-nav">
                <div class="detail_content-nav-name">
                {{$item->prod_name}}
                </div>


               

                <div class="footer-border"></div>
                <div class="detail_content-nav-flex">
                <div class="detail_content-nav-price">
                {{number_format($item->prod_price,0,',','.')}}₫
                </div>
                <div class="detail_content-nav-order">
                  <p>Đã bán: <span>{{$order}}</span></p>
                  <p>Kho hàng: <span>{{$stock->stock_quantity}}</span> </p>
                </div>
                </div>

                <div class="detail_content-nav-text">
                    Vận chuyển bởi BigStuffed™ from: <span>France</span> 🇫🇷
                </div>
                @if($stock->stock_quantity == 0)
                <div class="content_product-soldout-cate-detail">
                    Sold Out
                </div>
                @else
                <a onclick="AddCart({{$item->prod_id}})" href="javascript:" class="detail_content-nav-button">
                    Thêm vào giỏ hàng
                </a>
                @endif

                <div class="accordion " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item detail_content-nav-info ">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button detail_content-nav-info-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <i class='bx bx-heart'></i>
                            Materials & Care
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse  detail_content-nav-info-body" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                         <p>{!!$item->prod_materials!!}</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button detail_content-nav-info-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            <i class='bx bx-show'></i>
                            Description
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                         <p>{!!$item->prod_description!!}</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed detail_content-nav-info-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            <i class='bx bx-ruler' ></i>
                            Size Chart
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                          <p>{{$item->prod_size}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item detail_content-nav-info">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                          <button class="accordion-button detail_content-nav-info-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            <i class='bx bx-package' ></i>
                            Shipping & Returns
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingTwo">
                          <div class="accordion-body">
                            <p>
                                HOÀN TRẢ<br>
                                
                                Bạn có thể yêu cầu trả lại hoặc đổi bất kỳ sản phẩm nào trong vòng 45 ngày kể từ ngày giao hàng.<br>

                                Đối với hàng trả lại của khách hàng ở Liên minh Châu Âu, chúng tôi cung cấp dịch vụ vận chuyển hàng trả lại miễn phí.<br>

                                Đối với các đơn đặt hàng còn lại trên thế giới, chúng tôi chấp nhận trả lại, nhưng khách hàng phải lo phí vận chuyển và mọi chi phí thuế, nếu chúng được áp dụng.<br>

                                Bạn có thể liên hệ với Dịch vụ khách hàng của chúng tôi, người sẽ cung cấp giấy phép trả lại và nhãn Collissimo nếu có.<br>
                                                                
                                TRAO ĐỔI<br>
                                
                                Để đổi một mặt hàng, trước tiên bạn cần trả lại đơn đặt hàng của mình, sau đó, với điều kiện là nhận được hàng trong tình trạng giống như khi vận chuyển, khoản tiền hoàn lại có thể được xử lý và bạn có thể thực hiện giao dịch mua mới.<br>

                                BigStuffed sẽ không chịu chi phí vận chuyển cho đơn đặt hàng mới nếu chúng được áp dụng hoặc bất kỳ phiếu giảm giá/chiết khấu nào trước đây mà khách hàng đã có trong đơn đặt hàng ban đầu.<br>

                                Nếu bạn có bất kỳ câu hỏi hoặc thắc mắc nào về chính sách đổi trả của chúng tôi, vui lòng liên hệ với chúng tôi.<br>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                  <div class="rate_header">
                    Đánh giá
                    <span>({{$ratecount}})</span>
                  </div>
                  @if(Auth::check())
                  @if(count($bill) > 0)
                  <div class="rate">
                    <form method="post" enctype="multipart/form-data">
                    <div id="wrapper">
                      <input class="wrapper_input" type="radio" id="star1" name="star" value=1  />
                      <label class="label-wrapper" for="star1"></label>
                      <input class="wrapper_input" type="radio" id="star2" name="star"value=2 />
                      <label class="label-wrapper" for="star2"></label>
                      <input class="wrapper_input" type="radio" id="star3" name="star" value=3 checked="checked"/>
                      <label class="label-wrapper" for="star3"></label>
                      <input class="wrapper_input" type="radio" id="star4" name="star" value=4 />
                      <label class="label-wrapper" for="star4"></label>
                      <input class="wrapper_input" type="radio" id="star5" name="star" value=5 />
                      <label class="label-wrapper" for="star5"></label>
                    </div>
                    <textarea name="note" class="feedback-input" placeholder="Nhận xét của bạn về sản phẩm"></textarea>  
                    <input   class="pay_input" type="submit" value="Đánh Giá"/>
                    {{csrf_field()}}
                  </from>
                  </div>
                  @endif
                  @endif
                  <div class="comment">
                  @foreach($rate as $rates)
                    <div class=" comment-item">
                        <div class="comment-item-img ">
                            <img src="{{asset('lib/storage/app/avataruser/'.$rates->cus_img)}}" alt="">
                        </div>

                        <div class="comment-item-content ">
                            <div class="comment-item-content-name">
                              {{$rates->cus_name}}
                            </div>

                            <div class="comment-item-content-info">
                              <div class="comment-item-content-rate">
                              @for($i =1;$i<=$rates->rate_star;$i++) 
                                <label class="label-star"></label>
                              @endfor
                              </div>
                              <div class="comment-item-content-date">
                                {{$rates->rate_date}}
                              </div>
                            </div>

                            <div class="comment-item-text">
                             {{$rates->rate_text}}
              
                            </div>
                        </div>

                    </div>
                    <div class="footer-border"></div>
                  @endforeach
                </div>
                <div class="paginate">{{ $rate->links(); }}</div>
					        

            </div>
            </div>

            <div class="detail_content-suggest">
                <div class="detail_content-suggest-header">
                    <p>Hãy tìm BigStuffed cho bạn</p>
                    <a href=""># Có thể bạn cũng thích</a>
                </div>

                <div id="carouselExampleControls" class="carousel slide slide1" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="list_content-list-nav">
                            @foreach($slider1 as $prod)
                            <div class="list_content-list-item">
                                <div class="list_content-list-item-img">
                                    <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
                                    @if($prod->stock_quantity == 0)
                                      <div class="content_product-soldout-cate">Sold Out</div>
                                    @endif
                                    <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-detail">
                                        <h1>{{$prod->prod_name}}</h1>
                                        <span>
                                        {!!$prod->prod_description!!}
                                        </span>
            
                                    </a>
                                </div>
            
                                <div class="list_content-list-item-text">
                                    <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-text-name">
                                    {{$prod->prod_name}}
                                    </a>
            
                                    <div class="list_content-list-item-text-price">
                                    {{number_format($prod->prod_price,0,',','.')}}₫
                                    </div>
                                </div>
                            </div>
                            @endforeach        
                        </div>  
                      </div>
                      <div class="carousel-item">
                            <div class="list_content-list-nav">
                                    @foreach($slider2 as $prod)
                                    <div class="list_content-list-item">
                                        <div class="list_content-list-item-img">
                                            <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
                                            @if($prod->stock_quantity == 0)
                                               <div class="content_product-soldout-cate">Sold Out</div>
                                             @endif
                                            <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-detail">
                                                <h1>{{$prod->prod_name}}</h1>
                                                <span>
                                        {!!$prod->prod_description!!}
                                        </span>
                    
                                            </a>
                                        </div>
                    
                                        <div class="list_content-list-item-text">
                                            <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-text-name">
                                            {{$prod->prod_name}}
                                            </a>
                    
                                            <div class="list_content-list-item-text-price">
                                            {{number_format($prod->prod_price,0,',','.')}}₫
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach        
                            </div>  
                        </div>
                      <div class="carousel-item">
                        <div class="list_content-list-nav">
                                    @foreach($slider3 as $prod)
                                    <div class="list_content-list-item">
                                        <div class="list_content-list-item-img">
                                            <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
                                            @if($prod->stock_quantity == 0)
                                              <div class="content_product-soldout-cate">Sold Out</div>
                                            @endif
                                            <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-detail">
                                                <h1>{{$prod->prod_name}}</h1>
                                                <span>
                                        {!!$prod->prod_description!!}
                                        </span>
                    
                                            </a>
                                        </div>
                    
                                        <div class="list_content-list-item-text">
                                            <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-text-name">
                                            {{$prod->prod_name}}
                                            </a>
                    
                                            <div class="list_content-list-item-text-price">
                                            {{number_format($prod->prod_price,0,',','.')}}₫
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach        
                            </div>  
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev detail_content-suggest-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                    </button>
                    <button class="carousel-control-next detail_content-suggest-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      
                    </button>
                  </div>
            </div>

              



                    

        
        </div>
    </div>
@stop

