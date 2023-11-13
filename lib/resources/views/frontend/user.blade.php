@extends('frontend.master')
@section('title','Tài khoản')
@section('main')
<div id="menu_nav">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

                <p>Tài khoản</p>
            </div>
        </div>

        <div class="menu_content container">
            
            
            <div class="menu_content-header">
                Tài Khoản của tôi
            </div>
            <div class="user_content">
            
                <div class="user_info row">
                    <div class="user_info-header col-md-2">
                        <div>Thông tin tài khoản:</div> 
                    </div>
                    <form class="pay_form col-md-10">
                        <span class="user_span" >Họ Tên: <span class="user_text"> {{Auth::user()->cus_name}}</span></span>
                        <span class="user_span">Email: <span class="user_text">{{Auth::user()->cus_email}}</span></span>
                        <span class="user_span">Điện thoại: <span class="user_text">{{$users->phone}}</span></span>
                        <span class="user_span">Địa chỉ: <span class="user_text">{{$users->address}}</span></span>
                        
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
                            <a class="user_button-link" style="margin-right: 20px;" href="{{asset('/password')}}">Đổi mật khẩu</a>
                            <a class="user_button-link" href="{{asset('/useredit')}}">Thay đổi thông tin</a>
                        </div>
                    </form>
                    
                </div>

                <div class="user_info row" style="margin-top: 30px;">
                    <div class="user_info-header col-md-2">
                        <div>Đơn hàng:</div> 
                    </div>
                    <form class="pay_form-table col-md-10">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Đơn Hàng #</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Người nhận</th>
                                <th scope="col">Số tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Hủy Đơn</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $bill)
                              <tr>
                                <th >{{$bill->bill_id}}</th>
                                <td>{{$bill->bill_date}}</td>
                                <td>{{$bill->bill_name}}</td>
                                <td>{{number_format($bill->bill_total,0,',','.')}}₫</td>
                                <td>{{$bill->sta_name}}</td>
                                <td><a class="pay_form-table-a" href="{{asset('/order'.$bill->bill_id)}}">Xem chi tiết</a></td>
                                <td>
                                    @if($bill->bill_sta == 1 )
                                    <a onclick="return confirm('Bạn có chắc chắn muốn hủy bỏ đơn hàng?')" class="pay_form-table-a" href="{{asset('/status'.$bill->bill_id)}}">Hủy</a>
                                    @endif
                                </td>
                              </tr> 
                            @endforeach             
                            </tbody>
                          </table>
                          <div class="paginate">{{ $user->links(); }}</div>
                        </form>
                        
                    </div>
                </div>
        </div>
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
@stop