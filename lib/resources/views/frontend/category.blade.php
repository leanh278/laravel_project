@extends('frontend.master')
@section('title','Danh sách sản phẩm')
@section('main')
    <div id="list">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <a href="{{asset('/menu')}}">Bộ sưu tầm</a>

                <span>></span>

                <p>Thú bông {{$cate->cate_name}}</p>
            </div>
        </div>

        <div class="list_content container">
            <div class="list_content-header">
                Bộ sưu tập thú nhồi bông
            </div>

            <div class="list_content-name">
                <div class="list_content-name-header">
                    <p># BỘ SƯU TẬP</p>
                    <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">Thú bông {{$cate->cate_name}}</a>
                </div>
                <div class="container_nav-toolbar-top">
                        <div class="container_nav-toolbar-top-name">
                            Sắp xếp theo:
    
                        </div>
                        <div class="container_nav-toolbar-top-arrange">
                            <div class="container_nav-toolbar-top-arrange-list">
                                {{$name}}
                            
                                <ul class="container_nav-toolbar-top-arrange-item">
                                    <li><a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html'.'/'.'A-Z')}}">A-Z</a></li>
                                    <li><a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html'.'/'.'old')}}">Cũ nhất</a></li>
                                    <li><a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html'.'/'.'new')}}">Mới nhất</a></li>
                                    <li><a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html'.'/'.'priceReduce')}}">Giá từ cao đến thấp</a></li>
                                    <li><a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html'.'/'.'priceIncrease')}}">Giá từ thấp đến cao</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="list_content-list">
                @foreach($item as $prod)
                <div class="list_content-list-item">
                    <div class="list_content-list-item-img">
                        <img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" alt="">
                        @if($prod->stock_quantity == 0)
                            <div class="content_product-soldout-cate">Sold Out</div>
                        @endif

                        <a href="{{asset('detail'.$prod->prod_id.'/'.$prod->prod_slug.'.html')}}" class="list_content-list-item-detail">
                            <h1>{{$prod->prod_name}} </h1>
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
            <div class="paginate">{{ $item->links(); }}</div>
        </div>
    </div>
    <style>
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
            margin-top: 45px;
        }
        .paginate .bg-white{
            background-color: #FEFBF3 !important;
            border-radius: 10px;
            margin: 0 10px;
            padding: 10px 15px !important;
            font-size: 14px;
        }
        .paginate .shadow-sm{
            box-shadow: unset !important;
        }
        .paginate .cursor-default{
            font-weight: 700;
            
        }
    </style>
@stop
