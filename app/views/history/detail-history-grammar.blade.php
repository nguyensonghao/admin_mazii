@extends('history')

@section('content-history')
	@if(Session::get('result-undo') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> Hoàn tác thành công
		</div>
	@endif
	<div class="panel panel-primary">
	  <div class="panel-heading">
			<h3 class="panel-title">Chi tiết sửa đổi grammar</h3>
	  </div>
	  <div class="panel-body">
			<div class="history-record col-md-6">
			<h3>Dữ liệu cũ</h3>
			<p>Id : {{ $grammar_history->id }}</p>
			<p>Struct : {{ $grammar_history->struct }}</p>
			<p>Detail : {{ $grammar_history->detail }}</p>
			<p>Level : {{ $grammar_history->level }}</p>
			<p>Struct_vi : {{ $grammar_history->struct_vi }}</p>
		</div>

		<div class="current-record col-md-6">
			<h3>Dữ liệu hiện tại</h3>
			<p>Id : {{ $grammar->id }}</p>
			<p>Struct : {{ $grammar->struct }}</p>
			<p>Detail : {{ $grammar->detail }}</p>
			<p>Level : {{ $grammar->level }}</p>
			<p>Struct_vi : {{ $grammar->struct_vi }}</p>
		</div>
	  </div>
	  <a class="btn btn-primary" 
	  href="{{ Asset('history-undo-grammar') .'/' . $grammar->id }}">Hoàn tác
	  </a>
	  <a class="btn btn-success" href="{{ Asset('edit').'/'.$grammar->id }}">
	  	 Chỉnh sửa
	  </a>
	</div>
		
@endsection