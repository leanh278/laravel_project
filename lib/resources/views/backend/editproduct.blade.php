@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('main')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{$product->prod_name}}">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control" value="{{$product->prod_price}}">
									</div>
									<div class="form-group" >
									<label>Ảnh bìa </label>
									<input  id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('lib/storage/app/avatar/'.$product->prod_img)}}">
									</div>
									<div class="form-group" >
										<label>Kích cỡ</label>
										<input required type="text" name="size" class="form-control" value="{{$product->prod_size}}" >
									</div>
									<div class="form-group" >
										<label>Vật liệu</label>
										<textarea class="ckeditor" style="width: 794px; min-height: 211px;"  required name="materials" >{{$product->prod_materials}}</textarea>
									</div>									
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor"  style="width: 794px; min-height: 211px;"   height: 211px;  required name="description" > {{$product->prod_description}}</textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											@foreach($listcate as $cate)
											<option value="{{$cate->cate_id}}" @if($product->prod_cate == $cate->cate_id) selected @endif>{{$cate->cate_name}}</option>
											@endforeach
					                    </select>
									</div>

									<div class="upload__box">
										<div class="upload__btn-box">
											<label class="upload__btn">
											<p>Thêm Ảnh</p>
											<input type="file" multiple="" name="images[]" data-max_length="20" class="upload__inputfile">
											</label>
										</div>
										<div class="upload__img-wrap"></div>
									</div>

									<p style="max-width: 100%;margin-bottom: 5px;font-weight: 700;font-size: 14px;color: #5f6468;margin-top: 35px;">Ảnh được thêm</p>
									<div class="upload__img-wrap">
									@foreach($img as $imgs)
										<div class="upload__img-box" style="display: flex;flex-direction: column;">
										<img style="width: -webkit-fill-available;" src="{{asset('lib/storage/app/img/'.$imgs->imgnames)}}" alt="">
										<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('/img/delete'.$imgs->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</div>
									@endforeach
									</div>
									
									<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
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
