@extends('backend.layouts.master')
@section('title')
Danh mục
@endsection
@section('breadcrumbs', Breadcrumbs::render('categories'))
@section('content')
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						Danh mục
						<span class="label label-info pull-right">790 Items</span>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<a href="{{URL::route('categories.create')}}" class="btn btn-success">Thêm mới</a>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
					<table class="table table-striped table-bordered" id="responsiveTable">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tên danh mục</th>
								<th class="text-center">Danh mục con</th>
								<th class="text-center">Loại danh mục</th>
								<th class="text-center">Trạng thái</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $helper::parentTableCategories($categoryAll) ?>
						</tbody>
					</table>
					<div class="panel-footer clearfix">
					</div>
				</div>
@endsection