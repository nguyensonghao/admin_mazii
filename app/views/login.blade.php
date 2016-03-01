<!DOCTYPE html>
<html>
<head>
	<title>Quản lí góp ý của người dùng</title>
	{{ HTML::style('libs/bootstrap/css/bootstrap.css') }}
    {{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('libs/bootstrap/js/bootstrap.js') }}
    <style type="text/css">
		body {
			background: #f5f5f5;
		}

		.panel {
		    padding: 0;
		    border-radius: 0;
		    border-color: #ccc;
		    margin-top: 100px;
		}

		.panel-heading {
			border-radius: 0;
    		text-align: center;
		}

		form {
			padding: 10px 20px;
		}
    </style>
</head>
<body>	
	<div class="container">
		<div class="panel panel-primary col-md-4 col-md-offset-4">
			  <div class="panel-heading">
					<h3 class="panel-title">Đăng nhập tài khoản</h3>
			  </div>
			  <div class="panel-body">
					<form action="{{ Asset('login') }}" method="POST">
						@if (Session::get('result_login') == -2)
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Lỗi đăng nhập!</strong> không được để trống các trường
							</div>
						@endif

						@if (Session::get('result_login') == -1)
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Lỗi đăng nhập!</strong> tài khoản không tồn tại
							</div>
						@endif

						@if (Session::get('result_logout') == 1)
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Thông báo!</strong> bạn vừa đăng xuất thành công
							</div>
						@endif

						@if (Session::get('auth_login') == -1)
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Thông báo!</strong> bạn phải đăng nhập trước
							</div>
						@endif

						@if (Session::get('auth_login') == -2) 
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Thông báo!</strong> bạn không có quyền hạn
							</div>
						@endif



						<div class="form-group">
							<label for="">Tài khoản</label>
							<input type="text" class="form-control" name="username" 
							placeholder="Tài khoản">
						</div>
					
						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" name="password" 
							placeholder="Mật khẩu">
						</div>	
					
						<button type="submit" class="btn btn-primary">Đăng nhập</button>
					</form>
			  </div>
		</div>
	</div>
</body>
</html>