@extends('layouts.default')
@section('content')
<div class="wrapper">
<div class="logoutform">
	<p>ログアウトしました。</p>
	<p><a href="{{url('/login/login')}}">ログイン画面に戻る</a></p>
</div>
</div>

@endsection
