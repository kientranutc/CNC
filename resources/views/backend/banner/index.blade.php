@extends('backend.layouts.master')
@section('title')
Banner
@endsection
@section('breadcrumbs', Breadcrumbs::render('banner'))
@section('content')
<div class="panel panel-default table-responsive">
	<div class="panel-heading">
		Banner
		<span class="label label-info pull-right">{{count($dataBanner)}} banner</span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<a href="{{URL::route('banner.create')}}" class="btn btn-success">Thêm mới</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
		</div>
			<table class="table table-striped table-bordered" id="responsiveTable">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Ảnh</th>
						<th class="text-center">Đường dẫn</th>
						<th class="text-center">Vị trí</th>
						<th class="text-center">Trạng thái</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				@forelse($dataBanner as $item)
					<tr>
						<td class="text-center" width="5%">{{++$stt}}</td>
						<td class="text-center" width="20%"><img src="{{$item->image}}" width="100px" height="100px;" alt="{{$item->image}}"></td>
						<td class="text-center" width="20%"><a href="{{$item->url}}">{{$item->url}}</a></td>
						<td class="text-center" width="15%">{{$item->sort}}</a></td>
						<td class="text-center" width="15%">
							@if($item->status==1)
								<span class="btn btn-success">Hiển thị</span>
							@else
								<span class="btn btn-danger">Ẩn</span>
							@endif
						</td>
						<td class="text-center" width="15%">
							<a href="{{URL::route('banner.update',[$item->id])}}" class="btn btn-success"><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
							<a href="{{URL::route('banner.delete',[$item->id])}}" class='btn btn-danger delete-item'><i class='fa fa-times-circle fa-lg'></i></a>
						</td>
					</tr>
				@empty
				<tr>
					<td colspan="6" class="text-center">
						Dữ liệu trống
					</td>
				</tr>
				@endforelse
				</tbody>
			</table>
		<div class="panel-footer clearfix">
	</div>
</div>
@endsection