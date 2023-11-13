@extends('frontend.master')
@section('title','Menu')
@section('main')
    <div id="menu_nav">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <p>Bộ sưu tầm</p>
            </div>
        </div>

        <div class="menu_content container">
            <div class="menu_content-header">
                Bộ sưu tập thú nhồi bông
            </div>

            <div  class="menu_content-list">
            
            @foreach($list as $cate)
                <a href="{{asset('category'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" class="menu_content-item">
                    <div class="menu_content-item-img">
                        <img src="{{asset('lib/storage/app/avatar/'.$cate->prod_img)}}" alt="">
                    </div>
                    <div class="menu_content-item-text">
                     <span>{{$cate->cate_name}}</span>
                    </div>
                </a>
            @endforeach  
            
            </div>
        </div>
    </div>
@stop
 