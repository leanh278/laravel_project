@extends('backend.master')
@section('title','User')
@section('main')
<link rel="stylesheet" href="css/style-css.css">
<style>
    nav{
        margin: 0  0 20px;
    }
    .content_info-cart-list-item-delete{
        width: 30%;
    }
    .content_info-cart-text-delete{
        width: 30%;
    }
    .pay_form-table-a{
        padding: 5px 0;
        border-bottom: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style = "margin-top: 50px;">
    <div class="container">   
    <div class="menu_content-header">
        Chi tiết đơn hàng
    </div>
    <div class="user_content">
        <div class="user_info row">
        <div class="col-md-6">
            <div class="user_info-header ">
                Đơn hàng:
            </div>
            <form class="pay_form ">
                <span class="user_span order_span " ><span class="order_span-header">Mã đơn hàng:</span><span class="user_text order_text">{{$bill->bill_id}}</span></span>
                <span class="user_span order_span " ><span class="order_span-header">Ngày mua:</span><span class="user_text order_text"> {{$bill->bill_date}}</span></span>
                <span class="user_span order_span " ><span class="order_span-header">Tổng Tiền:</span><span class="user_text order_text"> {{number_format($bill->bill_total,0,',','.')}}₫</span></span>
            </form>
        </div>
        
            
            <div class="col-md-6">

                <div class="user_info-header ">
                    Thông tin người nhận:
                </div>
                <form class="pay_form ">
                    <span class="user_span order_span " ><span class="order_span-header">Họ tên:</span><span class="user_text order_text"> {{$bill->bill_name}}</span></span>
                    <span class="user_span order_span " ><span class="order_span-header">Số điện thoại:</span><span class="user_text order_text"> {{$bill->bill_phone}}</span></span>
                    <span class="user_span order_span " ><span class="order_span-header">Địa chỉ:</span><span class="user_text order_text"> {{$bill->bill_address}}</span></span>
                    <span class="user_span order_span " ><span class="order_span-header">Ghi chú:</span><textarea name="text"  class="feedback-input order_input" readonly>{{$bill->bill_note}}</textarea></span>
                </form>
            </div>
        </div>

        <div class="order_info">
            <div class="user_info-header ">
                Chi tiết đơn hàng:
            </div>
            <div class="accordion-body ">
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
                        Đánh giá
                    </div>
                </div>
    
                <div class="content_info-cart-list">
                @foreach($list as $bills)
                    <div class="change-item-cart">
                        <div class="content_info-cart-list-item">
                                <div class="content_info-cart-list-item-product">
                                    <a href="{{asset('detail'.$bills->prod_id.'/'.$bills->prod_slug.'.html')}}"  class="content_info-cart-list-item-img">
                                        <img src="{{asset('lib/storage/app/avatar/'.$bills->prod_img)}}" alt="">
                                    </a>
                                    <div class="content_info-cart-list-item-name">
                                    {{$bills->prod_name}}
                                    </div>
                                </div>
        
                                <div class="content_info-cart-list-item-pirce">
                                {{number_format($bills->prod_price,0,',','.')}}₫
        
                                </div>
                                <div class="content_info-cart-list-item-quantity header_wrapper-login-cart-nav-quantity">
                                
        
                                    <span >{{$bills->dtail_quantity}}</span>
                                
        
                                </div>
    
                                <div class="content_info-cart-list-item-sum">
                                {{number_format($bills->prod_price * $bills->dtail_quantity,0,',','.')}}₫
                                    
                                </div>
    
                                <div class="content_info-cart-list-item-delete">
                                    @foreach($rates as $rate)
                                    @if($user == $rate->rate_cus && $rate->rate_prod == $bills->prod_id)
                                    <div class="pay_form-table-a">
                                        <div style="margin-right: 20px;">
                                             @for($i =1;$i<=$rate->rate_star;$i++) 
                                            <label>★</label>
                                            @endfor
                                            <div class="comment-item-text">
                                            {{$rate->rate_text}}
                                            </div>
                                        </div>
    
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/rate/delete'.$rate->rate_id)}}">Delete</a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                    </div>
                    @endforeach
                                            
                    <div class="content_info-car-sum order_info-car-sum">
                        <div class="content_info-car-sum-pirce">
                            <span>Tổng thanh toán:</span>
                                <div class="content_info-car-sum-monney">
                                {{number_format($bill->bill_total,0,',','.')}}₫
                                </div>
                        </div>
    
                            
                    </div>
                                    
    
    
            
                    </div>
                
                </div>

        </div>
    </div>
</div>
@stop