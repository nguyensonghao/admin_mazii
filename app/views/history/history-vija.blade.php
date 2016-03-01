@extends('history')

@section('content-history')
	
<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<span class="glyphicon glyphicon-list"></span> 
		Danh sách lịch sử sửa đổi vija
	</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>Word</th>
					<th>Mean</th>
					<th>Cập nhật ngày</th>
					<th>Số lần cập nhật</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($vija_history as $value)
				<tr>
					<td>{{ $value->word }}</td>
					<td>{{ $value->mean }}</td>
					<td>{{ $value->lastUpdate }}</td>
					<td>{{ $value->numberUpdate }}</td>
					<td>
						<a href="{{ Asset('history-vija').'/'.$value->id }}" 
						class="btn btn-info btn-sm">
							<span class="glyphicon glyphicon-eye-open"></span> 
							Chi tiết							
						</a>
						<a href="#" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-refresh"></span> 
							Hoàn tác
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
{{ $vija_history->links() }}

@endsection