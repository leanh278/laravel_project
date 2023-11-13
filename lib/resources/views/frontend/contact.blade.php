@extends('frontend.master')
@section('title','Liên Lạc')
@section('main')
<div id="list">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>


                <p>Liên Lạc</p>
            </div>
        </div>
        <div class="menu_content container">
            
            
            <div class="menu_content-header">
               Liên Lạc
            </div>
            <div class="user_content">
                <div class="user_info row">
                <div class="col-md-6">
                    <div class="user_info-header ">
                        Bất kỳ thắc mắc nào
                    </div>
						@include('errors.note')
                    <form role="form" method="post" class="ques">      
                        <input name="name" type="text" class="feedback-input" placeholder="Name" />   
                        <input name="email" type="text" class="feedback-input" placeholder="Email" />
                        <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
                        <input type="submit" value="SUBMIT"/>
                        {{csrf_field()}}
                      </form>
                </div>
                
                    
                    <div class="col-md-6">

                        <div class="user_info-header ">
                            Thông tin liên lạc
                        </div>
                        <form class="pay_form ">
                            <span class="user_span order_span " ><span class="order_span-header">Địa chỉ email liên lạc:</span><span class="user_text order_text"> help@bigstuffed.com</span></span>
                            <span class="user_span order_span " ><span class="order_span-header">Địa chỉ bưu điện:</span><span class="user_text order_text"> BigStuffed - 10 rue de Crussol, 75011 - Paris - France</span></span>
                        </form>
                    </div>
                </div>

                
        
                
            </div>
        </div>
    </div>
@stop