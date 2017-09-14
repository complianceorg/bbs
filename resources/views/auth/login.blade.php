@extends('layouts.default')
@section('content')
<div class="wrapper">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ url('/auth/login') }}" method="post" class="passform">
    <h2 class="pass">ログイン認証コード</h2>
    {{ csrf_field() }}
    <input class="psps" type="email" name="email" required>
    <input class="psps" type="password" name="password" required>
    <input class="psbtn" type="submit" value="ログイン">
  </form>
</div>
@endsection
