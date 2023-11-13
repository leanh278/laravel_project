@extends('frontend.master')
@section('title','Thanh Toán')
@section('main')
<div id="list">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>


                <p>Thanh toán</p>
            </div>
        </div>
        <div class="container">
			<form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left">
                            <div class="row pay_row">
                                <span class="header ">Thanh Toán</span>
                            </div>
                            <form class="pay_form">
						    @include('errors.note') 
                                <span style="font-size: 16px;">Họ Tên:</span>
                                <input class="feedback-input" name="name" placeholder="Name" value="{{Auth::user()->cus_name}}">
                                <span style="font-size: 16px;">Số Điện Thoại:</span>
                                <input class="feedback-input" name="phone"  placeholder="0125 6780 4567 9909" value="{{$user->phone}}">
                                <span style="font-size: 16px;">Địa Chỉ:</span>
                                <input class="feedback-input" name="address" placeholder="Địa chị cụ thể" value="{{$user->address}}">
                                <span style="font-size: 16px;">Ghi Chú:</span>
                                <textarea name="note" class="feedback-input" placeholder="Comment"></textarea>  
                               
                            </form>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="right pay_right">
                            <div class="header pay_right-header">Đơn Đặt Hàng</div>
                        
                            @foreach(Session::get("Cart")->products as $item)
                            <div class="row item pay_right-item">
                                <div class="col-3 align-self-center pay_right-item-img"><img class="img-fluid" src="{{asset('lib/storage/app/avatar/'.$item['productInfo']->prod_img)}}"><span>{{$item['quanty']}}</span></div>
                                <div class="col-9 pay_right-item-text">
                                    <div class="row text-muted">{{$item['productInfo']->prod_name}}</div>
                                    <div class="row"><b>{{number_format($item['sumprice'],0,',','.')}}₫</b></div>
                                    
                                </div>
                            </div>
                            @endforeach
                        
                            
                            <hr>
                            <div class="row lower pay_right-order">
                                <div class="col text-left">Tổng tiền</div>
                                <div class="col text-right text-price">{{number_format(Session::get('Cart')->totalPrice,0,',','.')}}₫</div>
                            </div>
                            <div class="row lower pay_right-order">
                                <div class="col text-left">Vận chuyển</div>
                                <div class="col text-right text-price">Miễn phí</div>
                            </div>
                            <div class="row lower pay_right-order-total">
                                <div class="col text-left"><b>Tổng thanh toán</b></div>
                                <div class="col text-right pay_right-order-price text-price"><b>{{number_format(Session::get('Cart')->totalPrice,0,',','.')}}₫</b></div>
                            </div>
                            
                            <input   class="pay_input" type="submit" name = "cod" value="Thanh Toán Trực Tiếp"/>
                            <input   class="pay_input" type="submit"  name = "redirect" value="Thanh Toán Online"/>
                            {{csrf_field()}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
        

    </div>
@stop