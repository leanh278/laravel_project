@extends('backend.master')
@section('title','User')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style = "margin-top: 50px;">
    <div class="container">
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tài khoản User</h1>
			</div>
		</div><!--/.row-->
    
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default"style="width: 117px;">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="{{asset('admin/user/add')}}">Add user</a></li>
                	</ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">ID</td>
                    <td width="30%">Name</td>
                    <td width="30%">Email</td>
                    <td width="15%">Chức vụ</td>
                    <td width="10%">Edit</td>
                    <td width="10%">Delete</td>
                </tr>
                @foreach($userlist as $user)
                <tr>
                	<td>{{$user->cus_id}}</td>
                    <td>{{$user->cus_name}}</td>
                    <td>{{$user->cus_email}}</td>
                    <td>{{$user->par_name}}</td>
                    <td><a href="{{asset('admin/user/edit'.$user->cus_id)}}">Edit</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/user/delete'.$user->cus_id)}}">Delete</a></td>
                </tr>
				@endforeach
             
			</table>
            
        </div>
    </div>
</div>
</div>
@stop
