@extends('frontend.master')
@section('title','Đơn hàng')
@section('main')
<div id="list">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <a href="{{asset('/user')}}">Tài khoản</a>

                <span>></span>


                <p>Đơn hàng</p>
            </div>
        </div>
        <div class="menu_content container">
            
            
            <div class="menu_content-header">
               Đơn hàng của tôi
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
                @if($status->bill_sta == 5)
                    <div class="stepper">
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đã đặt đơn hàng">
                            <i class='bx bx-package'></i>
                        </div>
                        <div class="stepper-right colorb" style="width: 41%;"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đang chờ xác nhận">
                            <i class='bx bx-money'></i>
                        </div>
                        <div class="stepper-right colorb" style="width: 41%;"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đơn hàng đã được hủy">
                            <i class='bx bx-x-circle'></i>
                        </div>
                    </div>
                @else
                    <div class="stepper">
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đã đặt đơn hàng">
                            <i class='bx bx-package'></i>
                        </div>
                        <div class="stepper-right colorb"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đang chờ xác nhận">
                            <i class='bx bx-money'></i>
                        </div>
                        @if($status->bill_sta != 1)
                        <div class="stepper-right colorb"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đang vận chuyển ">
                            <i class='bx bxs-truck'></i>
                        </div>
                        @else
                        <div class="stepper-right "></div>
                        <div class="stepper-item " tabindex="0" data-bs-toggle="tooltip" title="Đang vận chuyển ">
                            <i class='bx bxs-truck'></i>
                        </div>
                        @endif
                        @if($status->bill_sta != 1 && $status->bill_sta != 2)
                        <div class="stepper-right colorb"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Đơn hàng đang giao">
                            <i class='bx bx-run' ></i>
                        </div>
                        @else
                        <div class="stepper-right"></div>
                        <div class="stepper-item" tabindex="0" data-bs-toggle="tooltip" title="Đơn hàng đang giao">
                            <i class='bx bx-run' ></i>
                        </div>
                        @endif
                        @if($status->bill_sta == 4)
                        <div class="stepper-right colorb"></div>
                        <div class="stepper-item color" tabindex="0" data-bs-toggle="tooltip" title="Hoàn thành">
                            <i class='bx bx-star'></i>
                        </div>
                        @else
                        <div class="stepper-right"></div>
                        <div class="stepper-item" tabindex="0" data-bs-toggle="tooltip" title="Hoàn thành">
                            <i class='bx bx-star'></i>
                        </div>
                        @endif
                    </div>
                @endif
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
                                        <a class="pay_form-table-a" href="{{asset('detail'.$bills->prod_id.'/'.$bills->prod_slug.'.html')}}">Xem</a></span>
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