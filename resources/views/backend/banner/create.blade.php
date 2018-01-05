@extends('backend.layouts.master') @section('title') Thêm mới tin tức
@endsection @section('breadcrumbs', Breadcrumbs::render('news-create'))
@section('style')
@endsection
@section('content')
<div class="panel panel-default table-responsive">
	 <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
	<div class="panel">
		<div class="field_wrapper">
    <div>
        <input type="text" name="field_name[]" class="form-control" value=""/>
    </div>
	</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('backend/js/banner/addFieldCreate.js')}}"></script>
@endsection