@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable alert-block">
        <button type="button" class="close" data-dismiss="alert">
         <i class="fa fa-times"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close closeMessage" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <span id="message">{{$errors->first()}}</span>
    </div>
@endif
