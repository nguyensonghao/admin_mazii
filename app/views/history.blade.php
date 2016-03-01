{{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
@extends('template/layout/main')

@section('content')

<div class="history">
	<div class="menu-history col-md-12">
		<ul>
			<li class="@if(isset($active_kanji)) {{ $active_kanji }} @endif">
				<a href="{{ Asset('history-kanji') }}">Kanji</a>
			</li>
			<li class="@if(isset($active_javi )) {{ $active_javi }} @endif">
				<a href="{{ Asset('history-javi') }}">Javi</a>
			</li>
			<li class="@if(isset($active_vija)) {{ $active_vija }} @endif">
				<a href="{{ Asset('history-vija') }}">Vija</a>
			</li>
			<li class="@if(isset($active_grammar)) {{ $active_grammar }} @endif">
				<a href="{{ Asset('history-grammar') }}">Grammar</a>
			</li>
		</ul>
	</div>
	<div class="content-history col-md-12">
		@yield('content-history')

	</div>	
	
</div>
	

@endsection