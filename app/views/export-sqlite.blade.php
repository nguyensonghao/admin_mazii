
@extends('template/layout/main')

@section('content')
	<h3>Xuất dữ liệu ra file sqlite</h3>
	@if(Session::has('result-export') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo: </strong> Xuất dữ liệu thành công
		</div>
	@endif

	@if(Session::get('exporting') == 1)

		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo: </strong> Bạn đang xuất dữ liệu
		</div>

	@endif
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Chú ý: </strong> Quá trình xuất dữ liệu có thể hơi tốn thời gian. Xin hãy mở cửa trình duyệt của bạn trong suốt quá trình ấy.
	</div>
	<div class="btn-group">
		<a class="btn btn-custom" href="{{ Asset('export-kanji') }}">
			Xuất bảng Kanji
		</a>
		<a class="btn btn-custom" href="{{ Asset('export-grammar') }}">
			Xuất bảng Grammar
		</a>
		<a class="btn btn-custom" href="{{ Asset('export-javi') }}">
			Xuất bảng Javi
		</a>
		<a class="btn btn-custom" href="{{ Asset('export-vija') }}">
			Xuất bảng Vija
		</a>
		<a class="btn btn-custom" href="{{ Asset('export-all') }}">
			Xuất tất cả dữ liệu
		</a>
	</div>

@endsection