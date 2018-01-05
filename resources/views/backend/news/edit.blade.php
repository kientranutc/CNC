@extends('backend.layouts.master') @section('title') Sửa tin tức
@endsection @section('breadcrumbs', Breadcrumbs::render('news-update'))
@section('style')
<link href="{{asset('backend/css/jquery.tagsinput.css')}}" rel="stylesheet"/>
@endsection
@section('content')
<div class="panel panel-default">
	<form class="no-margin" action="{{URL::route('news.edit',[$dataEdit->id])}}"
		method="post" id="formValidate1" data-validate="parsley" novalidate>
		{{csrf_field()}}
		<div class="panel-heading">Sửa bản tin</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
						<label for="title" class="control-label">Tiêu đề</label> <input
							type="text" placeholder="Tiêu đề" name="title" id="title"
							value="{{old('title')?old('title'):$dataEdit->title}}" class="form-control input-sm"
							required="required">
						<p class="text-danger">{{$errors->first('name')}}</p>
					</div>
					<!-- /form-group -->
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12" id="image-input-left">
							<div class="form-group">
								<label for="image-input">Ảnh</label> <input type="text"
								placeholder="Click để thêm ảnh" name="image" id="image-input" value="{{(old('image'))?old('image'):$dataEdit->image}}"
								class="form-control input-sm">
							</div>
						</div>
						<div class="col-md-6" id="image-input-right">
							<img alt="" src="{{(old('image'))?old('image'):$dataEdit->image}}" width="120px" height="100px" id="show-image-input">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div
						class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
						<label for="category_id" class="control-label">Danh mục</label>
						<select class="form-control" name="category_id" id="category_id">
							<option value="-1">--Chọn--</option>
							<?php $helper::parent($categoryNews, $dataEdit->category_id) ?>
						</select>
						<p class="text-danger">{{$errors->first('category_id')}}</p>
					</div>
					<!-- /form-group -->
				</div>
				<div class="col-md-6">
					<br><br>
					<div class="form-group">
						<label class="label-checkbox">
    						<input type="checkbox" {{($dataEdit->status==1)?'checked':''}} name="status" value="1">
    						<span class="custom-checkbox"></span>
    						Trạng thái
						</label>
						</div>
				</div>
			</div>
			<div class="form-group {{($errors->has('description'))?"has-error":""}}">
				<label class="control-label">Nội dung</label>
				<textarea  rows="" class="form-control input-sm description-news" cols="" name="description">{!!old('description')?old('description'):$dataEdit->description!!}</textarea>
			</div>
			<div class="form-group {{($errors->has('tag'))?"has-error":""}}">
				<label class="control-label" for="tag">Tag</label>
				<input name="tag" id="tag" class="tag-input" value="{{old('tag')?old('tag'):$dataEdit->tag}}">
					<p class="text-danger">{{$errors->first('tag')}}</p>
			</div>
		</div>
		<div class="panel-footer text-center">
			<button type="submit" class="btn btn-success">Cập nhật</button>
		</div>
	</form>
</div>
@endsection
@section('script')
	<script src="{{asset('backend/js/taginput/main.js')}}"></script>
	<script src="{{asset('backend/js/tinymce/main.js')}}"></script>
	<script src="{{asset('backend/js/modal/add_image_file_management.js')}}"></script>
@endsection