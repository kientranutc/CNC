@extends('backend.layouts.master')
@section('title')
Danh mục
@endsection
@section('breadcrumbs', Breadcrumbs::render('categories-create'))
@section('content')
<div class="panel panel-default">
							<form class="no-margin" action="{{URL::route('categories.edit',[$findCategory->id])}}" method="post" id="formValidate1" data-validate="parsley" novalidate>
									{{csrf_field()}}
								<div class="panel-heading">
									Sửa danh mục
								</div>
								<div class="panel-body">
								<div class="row">
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
												<label for="name" class="control-label">Tên danh mục</label>
												<input type="text" placeholder="Tên danh mục" name="name" id="name" value="{{old('name')?old('name'):$findCategory->name}}" class="form-control input-sm" required="required">
												<p class="text-danger">{{$errors->first('name')}}</p>
											</div><!-- /form-group -->
										</div>
										<div class="col-md-6">
											<div class="form-group">
                                              <label for="parent_id">Danh mục cha:</label>
                                              <select class="form-control" id="parent_id" name="parent_id" disabled="disabled">
                                              	<option value="0">--Chọn--</option>
                                                <?php $helper::parent($categoryAll, $findCategory->id) ?>
                                              </select>
                                            </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 {{ $errors->has('category_type') ? 'has-error' : '' }}">
											<div class="form-group">
                                              <label for="category_type" class="">Loại danh mục</label>
                                              <select class="form-control" id="category_type" name="category_type">
                                              <option value="-1">--Chọn--</option>
                                              @foreach(Config::get('constant.category_type') as $k=>$v)
                                               <option value="{{$k}}" {{($findCategory->category_type==$k)?'selected':''}}>{{$v}}</option>
                                               @endforeach
                                              </select>
                                              <p class="text-danger">{{$errors->first('category_type')}}</p>
                                            </div>
										</div><!-- /.col -->
										<div class="col-md-6">
										<br><br>
											<div class="form-group">
										     <label class="label-checkbox">
											<input type="checkbox" {{($findCategory->status==1)?'checked':''}} name="status" value="1">
											<span class="custom-checkbox"></span>
											Trạng thái
										</label>
									</div>
										</div><!-- /.col -->
									</div><!-- /.row -->
								</div>
								<div class="panel-footer text-center">
									<button type="submit" class="btn btn-success">Cập nhật</button>
								</div>
							</form>
						</div>
@endsection