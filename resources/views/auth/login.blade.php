@extends('layouts.default')
@section('content')
<div class="wrapper">
  <form action="{{ url('/auth/login') }}" method="post" class="passform">
    <h2 class="pass">ログイン認証コード</h2>
    {{ csrf_field() }}
    <input class="psps" type="email" name="email" required>
    <input class="psps" type="password" name="password" required>
    <input class="psbtn" type="submit" value="ログイン">
  </form>
</div>
@endsection
