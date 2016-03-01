@extends('history')

@section('content-history')
	
<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<span class="glyphicon glyphicon-list"></span> 
		Danh sách lịch sử sửa đổi grammar
	</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>Struct</th>
					<th>Detail</th>
					<th>level</th>
					<th>Struct_vi</th>
					<th>Cập nhật ngày</th>
					<th>Số lần cập nhật</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($grammar_history as $value)
				<tr>
					<td>{{ $value->struct }}</td>
					<td>{{ $value->detail }}</td>
					<td>{{ $value->level }}</td>
					<td>{{ $value->struct_vi }}</td>
					<td>{{ $value->lastUpdate }}</td>
					<td>{{ $value->numberUpdate }}</td>
					<td>
						<a href="{{ Asset('history-grammar').'/'.$value->id }}" 
						class="btn btn-info btn-sm">
							<span class="glyphicon glyphicon-eye-open"></span> 
							Chi tiết
						</a>
						<a href="#" 
						class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-refresh"></span> 
							Hoàn tác
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
{{ $grammar_history->links() }}

@endsection