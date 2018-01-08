@extends('backend.layouts.master') @section('title') Thêm mới banner
@endsection @section('breadcrumbs', Breadcrumbs::render('banner-create'))
@section('style')
@endsection
@section('content')
<div class="panel panel-default table-responsive">
	<input type="hidden" value="" id="hidden-image">
	<div class="panel">
	 		<div class="row">
	 			<div class="col-md-6">
	 			 <a href="javascript:void(0);" class="btn btn-danger add_button " title="Thêm mới"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
	 			</div>
	 			<div class="col-md-6 text-right">
	 			 <a href="javascript:void(0);" class="btn btn-success save_button" title="Lưu"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
	 			</div>
	 		</div>
	</div>
	<div class="panel">
		<div class="row">
		</div>
		<form action="{{URL::route('banner.create')}}" method="post" id="form-add-banner">
			{{csrf_field()}}
		<table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Image</th>
            <th class="text-center">Url</th>
            <th class="text-center">Sort</th>
          </tr>
        </thead>
        <tbody class="field_wrapper">
          <tr>
          	<td class="text-center" width="33%">
          	<input type="hidden" id="img_banner_1" name="field[image][]" value="{{asset('backend/img/not_found.png')}}">
          	<img alt="{{asset('backend/img/not_found.png')}}" id="banner_1" class="img-banner" data-count="1"  data width="100px" height="100px" src="{{asset('backend/img/not_found.png')}}">
          	</td>
          	<td class="text-center" width="33%"><input class="form-control" type="text" name="field[url][]" placeholder="Nhập đường dẫn" required></td>
          	<td class="text-right" width="33%"><input class="form-control" type="number" name="field[sort][]" placeholder="Sắp xếp vị trí" required></td>
          </tr>
        </tbody>
      </table>
      </form>
    </div>
	</div>
	</div>
</div>
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
<script type="text/javascript" src="{{asset('backend/js/banner/addFieldCreate.js')}}"></script>
@endsection