<!DOCTYPE html>
<html>
<head>
	<title>Quản lí góp ý của người dùng</title>
	{{ HTML::style('libs/bootstrap/css/bootstrap.css') }}
	{{ HTML::style('libs/css/home.css') }}
    {{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('libs/bootstrap/js/bootstrap.js') }}
</head>
<body>	
	@include('template/module/navbar')

	<div class="content col-md-12">

		@yield('content')

	</div>
</body>
</html>