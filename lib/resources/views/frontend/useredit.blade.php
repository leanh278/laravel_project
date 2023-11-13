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
                <p>Thay đổi thông tin</p>
            </div>
        </div>

        <div class="menu_content container">
            
            
            <div class="menu_content-header">
                Thay đổi thông tin
            </div>
            <div class="user_content">
            
                <div class="user_info row">
                    <div class="user_info-header col-md-2">
                        <div>Thông tin tài khoản</div> 
                    </div>
                    <form method="post" enctype="multipart/form-data" class="pay_form-user col-md-10">
						@include('errors.note') 
                        <span class="user_span" >Họ Tên:
                            <input class="feedback-input-user" placeholder="Name" name="name" value="{{Auth::user()->cus_name}}">
                        </span>
                        
                        <span class="user_span">Email:
                            <input class="feedback-input-user" placeholder="Email" name="email" value="{{Auth::user()->cus_email}}">
                        </span>

                        <span class="user_span">Điện thoại:
                            <input class="feedback-input-user" placeholder="Phone" name="phone" value="{{$user->phone}}">
                        </span>

                        <span class="user_span">Địa chỉ:
                            <input class="feedback-input-user" placeholder="Address" name="address" value="{{$user->address}}">
                        </span>

                       
                        
                        <span class="user_span">Avatar:
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input class="user_input" type='file' name="img" id="imageUpload"/>
                                    <label class="user_label" for="imageUpload"><i class='bx bx-pencil user_icon'></i></label>
                                    
                                </div>
                                <div class="avatar-preview">
                                @if(Auth::user()->cus_img == NULL)
                                    <div class="avatar-preview-div" id="imagePreview" style="background-image: url(http://localhost:8888/doan/public/backend/img/user.png);">
                                @else
                                <div class="avatar-preview-div" id="imagePreview" style="background-image: url({{asset('lib/storage/app/avataruser/'.Auth::user()->cus_img)}});">
                                @endif
                                </div>
                                </div>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
@stop