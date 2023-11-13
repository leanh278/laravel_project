@extends('backend.master')
@section('title','Email đăng ký')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style = "margin-top: 50px;">
    <div class="container">
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Email đã đăng ký</h1>
			</div>
		</div><!--/.row-->
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default"style="width: 117px;">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="{{asset('admin/contact')}}">Liên lạc</a></li>
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
                    <td width="30%">Email đã đăng ký</td>
                    <td width="10%">Delete</td>
                </tr>
                @foreach($sigin as $sigins)
                <tr>
                	<td>{{$sigins->id}}</td>
                    <td><a href="mailto:{{$sigins->sigins_email}}">{{$sigins->sigin_email}}</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/siginuser/delete'.$sigins->id)}}">Delete</a></td>
                </tr>
				@endforeach
             
			</table>
            
        </div>
    </div>
</div>
</div>
@stop
