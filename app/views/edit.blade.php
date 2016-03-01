
@extends('template/layout/main')

@section('content')

	@if (Session::get('result-edit') == 1)
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> Thay đổi thành công
	</div>

	@endif

	@if (Session::get('result-edit') == -1)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo</strong> Bạn không thay đổi gì so với phiên bản cũ
		</div>
	@endif
	
	<div class="left col-md-6">
		<form action="" method="POST" role="form">
			<legend>Góp ý người dùng</legend>
		
			<div class="form-group">
				<p><b>Từ</b> : {{ $result->entry }}</p><br>

				<p><b>Loại từ</b> : {{ $result->type }}</p><br>

				<p><b>Góp ý của người dùng</b> : {{ $result->comment }}</p><br>
			</div>
		
			<div class="form-group">
				<label>Nội dung cũ :</label><br>
				<?php 
					foreach ($wordDatabase as $key => $value) {
						if (gettype($value) == 'object') {
							foreach ($value as $key => $v) {
								echo htmlentities($v);
								echo '<hr>';
							}
						} else {
							echo htmlentities($value);
							echo '<hr>';
						}
						
					}
				?>
				
			</div>
		
			<a type="submit" class="btn btn-info" href="{{ Asset('finish') . '/' . $result->entryId }}">
				Kết thúc
			</a>
		</form>
	</div>
	

	<div class="right col-md-6 detail-edit">
	@if(Session::get('type') == 'grammar')
		{{-- Type of word is grammar --}}
		@include('edit/edit-grammar')

	@elseif(Session::get('type') == 'kanji')
		{{-- Type of word is kanji --}}
		@include('edit/edit-kanji')

	@elseif(Session::get('type') == 'javi')
		{{-- Type of word is javi --}}
		@include('edit/edit-javi')

	@else
		{{-- Type of word is vija --}}
		@include('edit/edit-vija')

	@endif

	</div>

@endsection