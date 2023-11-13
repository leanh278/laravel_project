@extends('frontend.master')
@section('title','Tài khoản')
@section('main')
<div id="menu_nav">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>
                <a href="{{asset('/user')}}">Tài khoản</a>

                <span>></span>
                <p>Đổi mật khẩu</p>
            </div>
        </div>

        <div class="menu_content container">
            
            
            <div class="menu_content-header">
                Thay đổi mật khẩu
            </div>
            <div class="user_content">
            
                <div class="user_info row">
                    <div class="user_info-header col-md-2">
                        <div>Thông tin tài khoản</div> 
                    </div>
                    <form method="post" enctype="multipart/form-data" class="pay_form-user col-md-10">
						@include('errors.note') 
                        <span class="user_span" >Họ Tên: <span class="user_text"> {{Auth::user()->cus_name}}</span></span>
                    
                         <span class="user_span">Email: <span class="user_text">{{Auth::user()->cus_email}}</span></span>

                         <span class="user_span">Mật khẩu mới:
                            <input class="feedback-input-user" placeholder="Password" type="password" name="password">
                        </span>
                        <span class="user_span">Nhập lại mật khẩu:
                            <input class="feedback-input-user" placeholder="Confirmation password" type="password" name="password_confirmation">
                        </span>
                        
                        <span class="user_span">Avatar:
                        <div class="avatar-preview">
                        @if(Auth::user()->cus_img == NULL)
                            <img class="avatar-preview-div" src="http://localhost:8888/doan/public/backend/img/user.png" alt="">
                        @else
                            <img class="avatar-preview-div" src="{{asset('lib/storage/app/avataruser/'.Auth::user()->cus_img)}}" alt="">
                        @endif
                        </div>
                        </span>
					   
                        
                        <div class="user_button">
                            <a class="user_button-link" style="margin-right: 20px;" href="{{asset('/user')}}">Hủy bỏ</a>
                            <input name="submit" type="submit" value="Thay đổi"/>
                        </div>
						{{csrf_field()}}
                    </form>
                    
                </div>

                
            </div>
        </div>
    </div>
    
@stop