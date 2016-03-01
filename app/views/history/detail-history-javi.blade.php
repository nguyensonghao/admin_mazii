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
				<h3 class="panel-title">Chi tiết sửa đổi javi</h3>
		  </div>
		  <div class="panel-body">
				<div class="history-record col-md-6">
					<h3>Dữ liệu cũ</h3>
					<p>Id : {{ $javi_history->id }}</p>
					<p>Word : {{ $javi_history->word }}</p>
					<p>Phonetic : {{ $javi_history->phonetic }}</p>
					<p>Mean : {{ $javi_history->mean }}</p>
				</div>

				<div class="current-record col-md-6">
					<h3>Dữ liệu hiện tại</h3>
					<p>Id : {{ $javi->id }}</p>
					<p>Word : {{ $javi->word }}</p>
					<p>Phonetic : {{ $javi->phonetic }}</p>
					<p>Mean : {{ $javi->mean }}</p>
				</div>
		  </div>
		  <a class="btn btn-primary" href="{{ Asset('history-undo-javi') .'/' . $javi->id }}">Hoàn tác</a>
		  <a class="btn btn-success" href="{{ Asset('edit').'/'.$javi->id }}">
		  	 Chỉnh sửa
		  </a>
	</div>
		
@endsection