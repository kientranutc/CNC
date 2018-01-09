@extends('backend.layouts.master')
@section('title')
Sản phẩm
@endsection
@section('breadcrumbs', Breadcrumbs::render('products'))
@section('content')
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-2">
							{{$productAll->total()}}-sản phẩm
							</div>
							<div class="col-md-10 text-right">
								<form class="form-inline" action="" method="get">
								 <input type="hidden" name="limit" value="{{Request::get('limit',10)}}">
                                  <div class="form-group">
                                    <label for="name">Tiêu đề:</label>
                                    <input type="text" name="name" value="{{Request::get('name', '')}}" class="form-control" id="name">
                                  </div>
                                  <div class="form-group">
                                    <label for="category_id">  Danh mục:</label>
                                   	<select class="form-control" id="category_id" name="category_id" onchange="this.form.submit()">
                                        <option value="-1">--Chọn--</option>
                                        <?php $helper::parentFilterMulti($categoryProducts,Request::get('category_id',-1))?>
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
								<a href="{{URL::route('products.create')}}" class="btn btn-success">Thêm mới</a>
							</div><!-- /.col -->
							<div class="col-md-8 text-right">
								<form class="form-inline" action="" method="get">
								 <input type="hidden" name="name" value="{{Request::get('name','')}}">
								 <input type="hidden" name="category_id" value="{{Request::get('category_id',-1)}}">
								  <input type="hidden" name="status" value="{{Request::get('status',-1)}}">
								<div class="form-group">
                                    <label for="pwd">Số sản phẩm trên một trang:</label>
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
								<th class="text-center">Tên sản phẩm</th>
								<th class="text-center">Ảnh sản phẩm</th>
								<th class="text-center">Loại sản phẩm</th>
								<th class="text-center">Giá</th>
								<th class="text-center">Giảm giá</th>
								<th class="text-center">Lượt xem</th>
								<th class="text-center">Trạng thái</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($productAll as $item)
								<tr>
									<td class="text-center">{{++$stt}}</td>
									<td class="text-center">{{$item->name}}</td>
									<td class="text-center"><img src="{{$item->image}}" alt="{{$item->image}}" width="100px" height="100px"></td>
									<td class="text-center">{{$item->category_name}}</td>
									<td class="text-center">{{number_format($item->price,0)}} ₫</td>
									<td class="text-center">{{$item->sale}}(%)</td>
									<td class="text-center">{{$item->viewed}} </td>
									<td class="text-center">
        								@if($item->status==1)
        									<span class="btn btn-success">Hiển thị</span>
        								@else
        									<span class="btn btn-danger">Ẩn</span>
        								@endif
        							</td>
        							<td class="text-center">
        							<a href="{{URL::route('products.update',[$item->id])}}" class="btn btn-success"><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
        							<a href="{{URL::route('products.delete',[$item->id])}}" class='btn btn-danger delete-item'><i class='fa fa-times-circle fa-lg'></i></a>
        							</td>
								</tr>
							@empty
							<tr>
								<td colspan="9" class="text-center">Dữ liệu trống.</td>
							</tr>
							@endforelse

						</tbody>
					</table>
					<div class="panel-footer clearfix text-right">
						{{
                   		$productAll ->appends(array(
                        'title'         => Request::get('name',''),
                        'category_id'=> Request::get('category_id',-1),
                        'status'          => Request::get('status',-1),
                        'limit'           => Request::get('limit','10')
                        )
                    )->links()
                }}
					</div>
				</div>
@endsection