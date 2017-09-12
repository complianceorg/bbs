@extends('layouts.default')
@section('content')
<div class="wrapper">
  <form action="{{ url('/login/conf2') }}" method="post" class="passform">
    <h2 class="pass">メールアドレス</h2>
    {{ csrf_field() }}
    <input class="psps"　type="email" name="email" required>
    <input class="psbtn" type="submit" value="ログイン"　>
  </form>
</div>
@endsection
