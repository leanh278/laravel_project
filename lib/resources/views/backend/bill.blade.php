@extends('backend.master')
@section('title','Bill')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style = "margin-top: 50px;">
    <div class="container">
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đơn hàng</h1>
			</div>
		</div><!--/.row-->
    
    <div class="row">
    	<div class="col-sm-12">
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">ID</td>
                    <td width="20%">Tài Khoản</td>
                    <td width="15%">Ngày</td>
                    <td width="20%">Tổng tiền</td>
                    <td width="20%">Trạng thái</td>
                    <td width="10%">Chi tiết</td>
                    <td width="10%">Delete</td>
                </tr>
                @foreach($userlist as $user)
                <tr>
                	<td>{{$user->bill_id}}</td>
                    <td>{{$user->cus_email}}</td>
                    <td>{{$user->bill_date}}</td>
                    <td>{{number_format($user->bill_total,0,',','.')}}₫</td>
                    <td>
                    @if($user->bill_sta != 4 && $user->bill_sta != 5)
                    <select name="links" class="form-control" onchange="window.location.href=this.value;">
                        @foreach($statuslist as $sta)
						<option value="{{asset('admin/bill/status'.$user->bill_id. '/'  .$sta->sta_id)}}" @if($user->bill_sta == $sta->sta_id) selected @endif>{{$sta->sta_name}}</option>
						@endforeach
                    </select> 
                    @else
                    {{$user->sta_name}}
                    @endif
                    </td>
                    <td><a href="{{asset('admin/bill/detail'.$user->bill_id)}}">Xem</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/bill/delete'.$user->bill_id)}}">Delete</a></td>
                </tr>
				@endforeach
             
			</table>
            
        </div>
    </div>
</div>
</div>
@stop
