@extends('history')

@section('content-history')
	@if(Session::get('result-undo') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> Hoàn tác thành công
		</div>
	@endif
	<div class="panel panel-primary">
		<div class="panel-body">
		   Chi tiết lịch sử sửa đổi vija
		   <div class="history-record col-md-6">
				<h3>Dữ liệu cũ</h3>
				<p>Id : {{ $vija_history->id }}</p>
				<p>Word : {{ $vija_history->word }}</p>
				<p>Mean : {{ $vija_history->mean }}</p>
			</div>

			<div class="current-record col-md-6">
				<h3>Dữ liệu hiện tại</h3>
				<p>Id : {{ $vija->id }}</p>
				<p>Word : {{ $vija->word }}</p>
				<p>Mean : {{ $vija->mean }}</p>
			</div>
		</div>
		<a class="btn btn-primary" href="{{ Asset('history-undo-vija') .'/' . $vija->id }}">
			Hoàn tác
		</a>
		<a class="btn btn-success" href="{{ Asset('edit').'/'.$vija->id }}">
	  	 	Chỉnh sửa
	  	</a>
	</div>
		
@endsection