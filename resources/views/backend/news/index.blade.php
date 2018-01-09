@extends('backend.layouts.master')
@section('title')
Tin tức
@endsection
@section('breadcrumbs', Breadcrumbs::render('news'))
@section('content')
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-2">
							Tin tức-{{$dataNews->total()}} Bản tin
							</div>
							<div class="col-md-10 text-right">
								<form class="form-inline" action="" method="get">
								 <input type="hidden" name="limit" value="{{Request::get('limit',10)}}">
                                  <div class="form-group">
                                    <label for="title">Tiêu đề:</label>
                                    <input type="text" name="title" value="{{Request::get('title', '')}}" class="form-control" id="title">
                                  </div>
                                  <div class="form-group">
                                    <label for="category_id">  Danh mục:</label>
                                   	<select class="form-control" id="category_id" name="category_id" onchange="this.form.submit()">
                                        <option value="-1">--Chọn--</option>
                                        <?php $helper::parentFilterMulti($categoryNews, Request::get('category_id', -1))?>
                                      </select>
                                  </div>
                                   <div class="form-group">
                                    <label for="status">  Trạng thái:</label>
                                   	<select class="form-control" id="status" name="status" onchange="this.form.submit()">
                                        <option value="-1">--Chọn--</option>
                                        <option value="1" {{(Request::get('status',-1)==1)?'selected':''}}>Hiển thị</option>
                                        <option value="0" {{(Request::get('status',-1)==0)?'selected':''}}>Ẩn</option>
                                      </select>
                                  </div>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                                </form>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<a href="{{URL::route('news.create')}}" class="btn btn-success">Thêm mới</a>
							</div><!-- /.col -->
							<div class="col-md-8 text-right">
								<form class="form-inline" action="" method="get">
								 <input type="hidden" name="title" value="{{Request::get('title','')}}">
								 <input type="hidden" name="category_id" value="{{Request::get('category_id',-1)}}">
								  <input type="hidden" name="status" value="{{Request::get('status',-1)}}">
								<div class="form-group">
                                    <label for="pwd">Số lượng bản tin trên một trang:</label>
                                   	<select id="sel1" name="limit" onchange="this.form.submit()">
                                   	@foreach(Config::get('constant.paginate_number') as $k=>$v)
                                        <option value="{{$k}}" {{(Request::get('limit',10)==$k)?'selected':''}}>{{$v}}</option>
                                    @endforeach
                                      </select>
                                  </div>
								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
					<table class="table table-striped table-bordered" id="responsiveTable">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tiêu đề</th>
								<th class="text-center">Ảnh</th>
								<th class="text-center">Loại tin</th>
								<th class="text-center">Tag</th>
								<th class="text-center">Nội dung</th>
								<th class="text-center">Lượt xem</th>
								<th class="text-center">Trạng thái</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
						@forelse($dataNews as $item)
						<tr>
							<td class="text-center">{{++$stt}}</td>
							<td class="text-center">{!!$item->title!!}</td>
							<td class="text-center"><img src="{{(!empty($item->image))?$item->image:''}}" width="100px" height="100px;"></td>
							<td class="text-center">{{$item->category_name}}</td>
							<td class="text-center">{{$item->tag}}</td>
							<td class="text-center">{!!str_limit($item->description, 20, ' (...)')!!}</td>
							<td class="text-center">{{$item->viewed}}</td>
							<td class="text-center">
								@if($item->status==1)
									<span class="btn btn-success">Hiển thị</span>
								@else
									<span class="btn btn-danger">Ẩn</span>
								@endif
							</td>
							<td class="text-center">
							<a href="{{URL::route('news.edit',[$item->id])}}" class="btn btn-success"><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
							<a href="{{URL::route('news.delete',[$item->id])}}" class='btn btn-danger delete-item'><i class='fa fa-times-circle fa-lg'></i></a>
							</td>
						</tr>
						@empty
						<tr>
						 	<td colspan="9" class="text-center">Dữ liệu trống</td>
						</tr>
						@endforelse
						</tbody>
					</table>
					<div class="panel-footer clearfix text-right">
					{{
                   		$dataNews ->appends(array(
                        'title'         => Request::get('title',''),
                        'category_id'=> Request::get('category_id',-1),
                        'status'          => Request::get('status',-1),
                        'limit'           => Request::get('limit','10')
                        )
                    )->links()
                }}
					</div>
				</div>
@endsection