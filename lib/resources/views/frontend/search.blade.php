@extends('frontend.master')
@section('title','Tìm kiếm')
@section('main')
    <div id="list">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <a href="{{asset('/menu')}}">Bộ sưu tầm</a>

                <span>></span>

                <p>Tìm kiếm</p>
            </div>
        </div>

        <div class="list_content container">
            <div class="list_content-header">
                Kết quả tìm kiếm
            </div>

            <div class="list_content-name">
                <div class="list_content-name-header">
                    <p># BỘ SƯU TẬP</p>
                    <a >Kết quả tìm kiếm:"{{$keyword}}"</a>
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
                        <a href="" class="list_content-list-item-text-name">
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
   
@stop
