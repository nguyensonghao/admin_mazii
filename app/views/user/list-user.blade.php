{{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
@extends('template/layout/main')

@section('content')

<div class="col-md-12">	
	<div class="col-md-8">
	@if (Session::get('result_delete_user') == -1)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> có lỗi trong quá trình xóa tài khoản
		</div>
	@endif

	@if (Session::get('result_delete_user') == 1)
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> bạn vừa xóa 1 tài khoản người dùng
		</div>
	@endif
		<div class="panel panel-primary">
			<!-- Default panel contents -->
			<div class="panel-heading bg-primary">
				<span class="glyphicon glyphicon-list"></span>
				Danh sách người dùng
			</div>
		
				<!-- Table -->
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Tài khoản</th>
							<th>Ngày tạo</th>
							<th>Đăng nhập gần nhất</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list_user as $value)
							<tr>
								<td>{{ $value->username }}</td>
								<td>{{ $value->created_at }}</td>
								<td>{{ $value->updated_at }}</td>
								<td>
									<a class="btn btn-custom" 
									href="{{ Asset('delete-user').'/'.$value->id }}">
										Xóa
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<div class="col-md-4">
		@if (Session::get('result_add_user') == -1)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> có lỗi trong quá trình thêm người dùng
			</div>
		@endif

		@if (Session::get('result_add_user') == -2)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> điền đẩy đủ thông tin người dùng
			</div>
		@endif

		@if (Session::get('result_add_user') == 1)
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> thêm người dùng thành công
			</div>
		@endif
		<form action="{{ Asset('add-user') }}" method="POST">
			<legend>Thêm người dùng</legend>
		
			<div class="form-group">
				<label for="">Tài khoản</label>
				<input type="text" class="form-control"
				 name="username" placeholder="Tài khoản">
			</div>
		
			<div class="form-group">
				<label for="">Mật khẩu</label>
				<input type="password" class="form-control"
				 name="password" placeholder="Mật khẩu">
			</div>	
		
			<button type="submit" class="btn btn-primary">Thêm</button>
			<button type="reset" class="btn btn-default">Làm mới</button>
		</form>

	</div>
</div>

@endsection