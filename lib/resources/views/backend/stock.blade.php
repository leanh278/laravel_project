@extends('backend.master')
@section('title','Quản lý kho')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý kho</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">

		<div class="col-xs-12 col-md-7 col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách kho</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
							<thead>
								<tr class="bg-primary">
									<th>Tên sản phẩm</th>
									<th>SL</th>
									<th style="width:10%">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
							@foreach($stocklist as $stock)
							<tr>
								<td>{{$stock->prod_name}}</td>
								<td>{{$stock->stock_quantity}}</td>
								<td>
									<a href="{{asset('admin/stock/edit'.$stock->stock_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop
