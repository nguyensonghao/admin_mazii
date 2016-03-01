
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
				<h3 class="panel-title">Chi tiết sửa đổi kanji</h3>
		  </div>
		  <div class="panel-body">
				<div class="history-record col-md-6">
			<h3>Dữ liệu cũ</h3>
			<p>Id : {{ $kanji_history->id }}</p>
			<p>Kanji : {{ $kanji_history->kanji }}</p>
			<p>Mean : {{ $kanji_history->mean }}</p>
			<p>Level : {{ $kanji_history->level }}</p>
			<p>On : {{ $kanji_history->on }}</p>
			<p>Kun : {{ htmlentities($kanji_history->kun) }}</p>
			<p>Img : {{ htmlentities($kanji_history->img) }}</p>
			<p>Detail : {{ $kanji_history->detail }}</p>
			<p>Short : {{ $kanji_history->short }}</p>
			<p>Freq : {{ $kanji_history->freq }}</p>
			<p>Comp : {{ $kanji_history->comp }}</p>
			<p>Stroke_count : {{ $kanji_history->stroke_count }}</p>
			<p>CompDetail : {{ $kanji_history->compDetail }}</p>
			<p>Examples : {{ $kanji_history->examples }}</p>
		</div>

		<div class="current-record col-md-6">
			<h3>Dữ liệu hiện tại</h3>
			<p>Id : {{ $kanji->id }}</p>
			<p>Kanji : {{ $kanji->kanji }}</p>
			<p>Mean : {{ $kanji->mean }}</p>
			<p>Level : {{ $kanji->level }}</p>
			<p>On : {{ $kanji->on }}</p>
			<p>Kun : {{ htmlentities($kanji->kun) }}</p>
			<p>Img : {{ htmlentities($kanji->img) }}</p>
			<p>Detail : {{ $kanji->detail }}</p>
			<p>Short : {{ $kanji->short }}</p>
			<p>Freq : {{ $kanji->freq }}</p>
			<p>Comp : {{ $kanji->comp }}</p>
			<p>Stroke_count : {{ $kanji->stroke_count }}</p>
			<p class="json">CompDetail : {{ $kanji->compDetail }}</p>
			<p class="json">Examples : {{ $kanji->examples }}</p>
		</div>
		<hr>
		<a class="btn btn-primary" href="{{ Asset('history-undo-kanji') .'/' . $kanji->id }}">
			Hoàn tác
		</a>
		<a class="btn btn-success" href="{{ Asset('edit').'/'.$kanji->id }}">
	  		Chỉnh sửa
	  	</a>
	</div>
		
@endsection
<script>
	
$(document).ready(function () {
	$('.json').each(function () {
		var meanJson = $(this).val();
		meanJson = JSON.stringify(JSON.parse(meanJson), undefined, 2);
		$(this).val(meanJson);
	})	
})

</script>
