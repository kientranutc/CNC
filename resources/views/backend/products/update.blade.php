@extends('backend.layouts.master')
@section('title')
Thêm mới sản phẩm
@endsection
@section('style')
<link href="{{asset('backend/css/jquery.tagsinput.css')}}" rel="stylesheet"/>
@endsection
@section('breadcrumbs', Breadcrumbs::render('product-update'))
@section('content')
<form action="{{URL::route('products.update',[$editProduct->id])}}" method="post">
<div class="panel panel-default">
<div class="panel-body">
	 		<div class="row">
	 			<div class="col-md-6 col-md-offset-6 text-right">
	 			 <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	 			</div>
	 		</div>
	</div>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Sản phẩm</a></li>
  <li><a data-toggle="tab" href="#menu1">Nội dung sản phẩm</a></li>
  <li><a data-toggle="tab" href="#menu2">Ảnh sản phẩm</a></li>
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
   <div class="panel panel-default">
   			<br>
		{{csrf_field()}}
		<div class="panel-heading"></div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="control-label">Tên sản phẩm</label> <input
							type="text" placeholder="Tên sản phẩm" name="name" id="name"
							value="{{(old('name'))?old('name'):$editProduct->name}}" class="form-control input-sm"
							>
						<p class="text-danger">{{$errors->first('name')}}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12" id="image-input-left">
							<div class="form-group">
								<label for="image-input">Ảnh</label> <input type="text"
								placeholder="Click để thêm ảnh" name="image" id="image-input" value="{{(old('image'))?old('image'):$editProduct->image}}"
								class="form-control input-sm">
							</div>
						</div>
						<div class="col-md-6" id="image-input-right">
							<img alt="" src="" width="120px" height="100px" id="show-image-input">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
						<label for="title" class="control-label">Giá</label> <input
							type="text" placeholder="Giá." name="price"
							value="{{(old('price'))?old('price'):$editProduct->price}}" class="form-control input-sm price-product"
							>
						<p class="text-danger">{{$errors->first('price')}}</p>
					</div>
					<!-- /form-group -->
				</div>
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('sale') ? ' has-error' : '' }}">
						<label for="sale" class="control-label">Giảm giá</label> <input
							type="text" placeholder="Giảm giá" name="sale"
							value="{{(old('sale'))?old('sale'):$editProduct->sale}}" class="form-control input-sm sale-product"
							>
						<p class="text-danger">{{$errors->first('sale')}}</p>
					</div>
					<!-- /form-group -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
						<label for="category_id" class="control-label">Danh mục</label>
						<select class="form-control" name="category_id" id="category_id">
							<option value="-1">--Chọn--</option>
							<?php $helper::parentFilterMulti($categoryproducts,$editProduct->category_id)?>
						</select>
						<p class="text-danger">{{$errors->first('category_id')}}</p>
					</div>
					<!-- /form-group -->
				</div>
				<div class="col-md-6">
					<br><br>
					<div class="form-group">
						<label class="label-checkbox">
    						<input type="checkbox" {{($editProduct->status==1)?'checked':''}} name="status" value="1">
    						<span class="custom-checkbox"></span>
    						Trạng thái
						</label>
						</div>
				</div>
			</div>
			<div class="form-group {{($errors->has('tag'))?"has-error":""}}">
				<label class="control-label" for="tag">Tag</label>
				<input name="tag" id="tag" class="tag-input" value="{{(old('tag'))?old('tag'):$editProduct->tag}}" placeholder="Thêm tag">
					<p class="text-danger">{{$errors->first('tag')}}</p>
			</div>
		</div>
   </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <div class="panel panel-default">
	<div class="panel-body">
    	<div class="form-group {{($errors->has('description'))?"has-error":""}}">
				<label class="control-label">Mô tả</label>
				<textarea  rows="" class="form-control input-sm description-news" cols="" name="description">{{(old('description'))?old('description'):$editProduct->description}}</textarea>
		</div>
		<div class="form-group {{($errors->has('product_detail'))?"has-error":""}}">
				<label class="control-label">Nội dung chi tiết</label>
				<textarea  rows="" class="form-control input-sm description-news" cols="" name="product_detail">{{(old('product_detail'))?old('product_detail'):$editProduct->product_detail}}</textarea>
		</div>
    </div>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
      <div class="panel panel-default">
      <input type="hidden" value="" id="hidden-image">
		<div class="panel-body">
	 		<div class="row">
	 			<div class="col-md-6">
	 			 <a href="javascript:void(0);" class="btn btn-danger add_button_product " title="Thêm mới"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
	 			</div>
	 		</div>
		</div>
		<div class="panel-body">
			<div class="panel">
		<div class="row">
		</div>
			{{csrf_field()}}
		<table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Ảnh sản phẩm</th>
            <th class="text-center">Vị trí</th>
          </tr>
        </thead>
        <tbody class="field_wrapper">
        <?php
        $total=0;
        $i=1; ?>
        @forelse($listImageForProduct as $item)
          <tr>
          	<td class="text-center" width="33%">
          	<input type="hidden" name="field[id][]" value="{{$item->id}}">
          	<input type="hidden" name="field[product_id][]" value="{{$item->product_id}}">
          	<input type="hidden" id="img_banner_{{$i}}" name="field[image][]" value="{{(!empty($item->image))?$item->image:'backend/img/not_found.png'}}">
          	<img alt="{{(!empty($item->image))?$item->image:'/backend/img/not_found.png'}}" id="banner_{{$i}}" class="img-banner" data-count="{{$i}}"   width="100px" height="100px" src="{{(!empty($item->image))?$item->image:'/backend/img/not_found.png'}}">
          	</td>
          	<td class="text-right" width="33%"><input class="form-control" type="number" name="field[sort][]" value="{{$item->sort}}" placeholder="Sắp xếp vị trí"><a href="javascript:void(0);" class="btn btn-danger remove_buttons" data-id="{{$item->id}}" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></td>
          </tr>
            <?php
            $total+=$i;
            $i++ ?>
        @empty
        <tr>
        	<td colspan="2" class="text-center">Dữ liệu trống</td>
        </tr>
        @endforelse
        </tbody>
      </table>
      <input type="hidden" value="{{$total}}" name="totalPosition">
    </div>
		</div>
	</div>
  </div>
</div>
</div>
</form>
@endsection
@section('modal')
	<div id="imageModalMore" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<iframe  width="100%" height="550" frameborder="0" src="{{URL::to('/')}}/media/filemanager/dialog.php?type=&field_id=hidden-image">
				</iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
			</div>
		</div>

	</div>
</div>
@endsection
@section('script')
	<script src="{{asset('backend/js/taginput/main.js')}}"></script>
	<script src="{{asset('backend/js/tinymce/main.js')}}"></script>
	<script src="{{asset('backend/js/products/format_price.js')}}"></script>
	<script src="{{asset('backend/js/modal/add_image_file_management.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/products/add_field_more.js')}}"></script>
@endsection
