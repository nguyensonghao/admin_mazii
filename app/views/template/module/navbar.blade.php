<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Mazii Admin</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="{{ Asset('home') }}">
						<span class="glyphicon glyphicon-home"></span>
						Danh sách góp ý
					</a>
				</li>
				<li>
					<a href="{{ Asset('history-kanji') }}">
						<span class="glyphicon glyphicon-dashboard"></span>
						Lịch sử
					</a>
				</li>

				@if (Auth::user()->role == 1)

				<li>
					<a href="{{ Asset('export') }}">
						<span class="glyphicon glyphicon-arrow-down"></span>
						Xuất dữ liệu
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ Asset('list-user') }}">
						<span class="glyphicon glyphicon-user"></span> 
						Quản lí người dùng
					</a>
				</li>

				@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{ Asset('logout') }}" class="btn btn-link">Đăng xuất</a>
				</li>
		    </ul>

		</div><!-- /.navbar-collapse -->
	</nav>