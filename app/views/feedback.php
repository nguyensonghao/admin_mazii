{{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}

@extends('template/layout/main')

@section('content')
	@if (Session::has('alert'))
	<div class="alert alert-info">
		<strong>Thông báo!</strong> {{ Session::get('alert') }}
	</div>
	@endif

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Góp ý</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list_note as $value)
				<tr>
					<td>{{ $value->mean }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ $list_note->links() }}