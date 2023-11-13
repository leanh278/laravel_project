@extends('backend.master')
@section('title','Cập nhật kho hàng')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý kho hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa số lượng kho
						</div>
						<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Số lượng sửa đổi:</label>
    							<input type="number" name="quantity" class="form-control" placeholder="Số lượng sửa đổi" value="{{$stock->stock_quantity}}">
							</div>
							<div class="form-group">
								<input type="submit" name ="submit" class="form-control btn btn-primary" value="Sửa">
							</div>
							<div class="form-group">
								<a href="{{asset('admin/stock')}}" class="form-control btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						{{csrf_field()}}
					</form>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop