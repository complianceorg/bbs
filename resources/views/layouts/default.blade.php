<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="noindex">
	<title>BOツール掲示板</title>
	<link rel="stylesheet" href="{{ url('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ url('/css/style.css') }}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url('/js/footerFixed.js') }}"></script>
</head>
<body>
<header>
	<h1>BOツール掲示板</h1>
	<a href="{{url('/login/logout')}}">ログアウト</a>
</header>

@if (session('flash_message'))
<div class="flash_message" onclick="this.classList.add('hidden')">{{session('flash_message')}}
</div>
@endif

@if (count($errors) > 0)
		<div class="alert alert-danger">
				<ul>
						@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
						@endforeach
				</ul>
		</div>
@endif
@yield('content')
<footer id="footer">
		<small>Copyright &copy; <?php echo (date("Y") == "2017") ? "2017": "2017 ～ ".date("Y"); ?> BOツール＆掲示板 All Rights Reserved.</small>
</footer>
</body>
</html>
