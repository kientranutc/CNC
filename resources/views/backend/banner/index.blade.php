@extends('backend.layouts.master')
@section('title')
Banner
@endsection
@section('breadcrumbs', Breadcrumbs::render('banner'))
@section('content')
<div class="panel panel-default table-responsive">
	<div class="panel-heading">
		Danh mục
		<span class="label label-info pull-right">790 Items</span>
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
				</tbody>
			</table>
		<div class="panel-footer clearfix">
	</div>
</div>
@endsection