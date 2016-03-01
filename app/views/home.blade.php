{{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}

@extends('template/layout/main')

@section('content')
	
	@if (Session::get('result_login') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> đăng nhập thành công
		</div>
	@endif

	@if(Session::get('success-finish') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo</strong> Bạn vừa hoàn thành 1 report
		</div>
	@endif

	@if(Session::get('success-finish') == -1)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo</strong> Report này đã được hoàn thành
		</div>
	@endif

	<div class="content-left col-md-9">

		<div class="panel panel-primary">
			<!-- Default panel contents -->
			<div class="panel-heading bg-primary">
				<span class="glyphicon glyphicon-list"></span>
				Danh sách vấn đề đang cần sửa chữa
			</div>
		
				<!-- Table -->
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Từ lỗi</th>
							<th>Loại từ</th>
							<th>Ngày báo</th>
							<th>Chỉnh sửa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $value)
							<tr>
								<td> {{ $value->entry }} </td>
								<td> {{ $value->type }} </td>
								<td> {{ $value->getCreatedAt()->format('Y-m-d H:i:s') }} </td>
								<td>
									<a class="btn btn-sm btn-danger"
										href="{{ Asset('edit').'/'.$value->getObjectId()}}">
										<span class="glyphicon glyphicon-pencil"></span>
										Sửa
									</a>
									<a class="btn btn-sm btn-info"
										title="Nội dung góp ý" data-toggle="popover"
										data-content="{{ $value->comment }}" data-placement="right">
										<span class="glyphicon glyphicon-ok"></span>
										Chi tiết
									</a>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
				{{ $result->links() }}
			</div>
		</div>
	</div>

	<div class="content-right col-md-3">
		<h4 class="bg-primary title-sort">
			<span class="glyphicon glyphicon-cog"></span>
			Sắp xếp theo
		</h4>
		<ul class="list-group">
			<li class="list-group-item createdAt">
				<a>

					Ngày tháng
					<div class="btn-toolbar-search">
						<a type="button" class="btn btn-default btn-sm" 
						href="{{ Asset('sort/createdAt/asc')}}">
							<span class="glyphicon glyphicon-arrow-up"></span>
						</a>
						<a type="button" class="btn btn-default btn-sm"
						href="{{ Asset('sort/createdAt/desc')}}">
							<span class="glyphicon glyphicon-arrow-down"></span>
						</a>
					</div>
				</a>
			</li>
			
			<li class="list-group-item entry">
				<a>
					Theo tên
					<div class="btn-toolbar-search">
						<a type="button" class="btn btn-default btn-sm" 
						href="{{ Asset('sort/entry/asc')}}">
							<span class="glyphicon glyphicon-arrow-up"></span>
						</a>
						<a type="button" class="btn btn-default btn-sm"
						href="{{ Asset('sort/entry/desc')}}">
							<span class="glyphicon glyphicon-arrow-down"></span>
						</a>
					</div>
				</a>
			</li>

			<li class="list-group-item type">
				<a>

					Loại từ
					<div class="btn-toolbar-search">
						<a type="button" class="btn btn-default btn-sm"
						href="{{ Asset('sort/type/asc')}}">
							<span class="glyphicon glyphicon-arrow-up"></span>
						</a>
						<a type="button" class="btn btn-default btn-sm"
						href="{{ Asset('sort/type/desc')}}">
							<span class="glyphicon glyphicon-arrow-down"></span>
						</a>
					</div>
				</a>
			</li>
		</ul>

	</div>

@endsection

<script>
	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover(); 
	    $('body').on('click', function (e) {
	        $('[data-toggle="popover"]').each(function () {
	          if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
	            $(this).popover('hide');
	          }
	        });
	    });

	});
</script>