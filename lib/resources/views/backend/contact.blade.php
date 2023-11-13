@extends('backend.master')
@section('title','Liên lạc')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style = "margin-top: 50px;">
    <div class="container">
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Liên lạc</h1>
			</div>
		</div><!--/.row-->
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default"style="width: 200px;">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="{{asset('admin/siginuser')}}">Email đăng ký</a></li>
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
                    <td width="45%">Nội dung</td>
                    <td width="30%">Trả lời</td>
                    <td width="10%">Delete</td>
                </tr>
                @foreach($contact as $cont)
                <tr>
                	<td>{{$cont->id}}</td>
                    <td>{{$cont->cont_name}}</td>
                    <td>{{$cont->cont_text}}</td>
                    <td><a href="mailto:{{$cont->cont_email}}">{{$cont->cont_email}}</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/contact/delete'.$cont->id)}}">Delete</a></td>
                </tr>
				@endforeach
             
			</table>
            
        </div>
    </div>
</div>
</div>
@stop
