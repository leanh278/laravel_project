@extends('backend.master')
@section('title','user')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm User</div>
					<div class="panel-body">
					@include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên User</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Gmail</label>
										<input required type="email" name="email" class="form-control">
									</div>
									<div class="form-group" >
								
									<div class="form-group" >
										<label>Mật khẩu</label>
										<input required type="password" name="passwords" class="form-control">
									</div>								
									<div class="form-group" >
										<label>Chức vụ</label>
										<select required name="par" class="form-control">
											@foreach($userlist as $user)
											<option value="{{$user->par_id}}">{{$user->par_name}}</option>
											@endforeach
					                    </select>
									</div>
                                    <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
