@extends('layouts.NoLogout')
@section('content')
<div class="wrapper">
	<div class="m-icon">
		<p><i class="fa fa-envelope fa-big" aria-hidden="true"></i></p>
	</div>
  <form class="loginform" action="{{ url('/login/conf2') }}" method="post" class="passform">
    <h2 class="pass">メールアドレス</h2>
    {{ csrf_field() }}
    <input class="psps" type="email" name="email" required>
    <input class="psbtn" type="submit" value="ログイン" >
  </form>
  <a class="logintop" href={{ url('/login/signupab') }}>新規登録する</a>
</div>
@endsection
