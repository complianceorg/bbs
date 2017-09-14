@extends('layouts.default')
@section('content')
<div class="wrapper">
    <div class="ninsyou-box">
      <form action="{{ url('login/conf') }}" method="post" class="passform">
        <h2 class="pass">認証コード</h2>
        {{ csrf_field() }}
        <input class="psps" type="password" name="password" required>
        {{--<input type="hidden" name="email" value="{{$id or 'default'}}">--}}
        <input class="psbtn" type="submit" value="認証">
        </form>
        <p><a href="{{url('/login/login')}}">ログイン画面へ行く</a></p>
    </div>
  <div class="login-box">
    <h2 class="log-midashi">BO掲示板＆ツールを使うならこちらから！</h2>
    <p class="log-text">下の３つの項目の中から一つ選んで、メールアドレス登録またはLINE友達登録またはtwitterの相互フォローを行ってください。折り返し、ログインに必要なパスワードをお教えします。</p>
    <p class="sentaku-text">■こちらの3つの選択肢の中から一つ選択してください</p>
  <div class="sentaku-box">
    <div class="s-box">
    <p><i class="fa fa-envelope fa-4x m-iro" aria-hidden="true"></i></p>
    <h3>メールアドレス</h3>
    <form action="{{ url('/login/signup') }}" method="post">
      {{ csrf_field() }}
    <input type="email" name="email">
    <input class="mail" type="submit" value="送信">
    </form>
    <p>※メールアドレスを登録してください。確認出来次第、折り返しパスワードをお教え致します。</p>
    </div>
    <div class="s-box">
    <p><img src="{{ url('/img/line1.jpg') }}" alt="LINE"></p>
    <h3>LINE</h3>
    <p><a href="#">QRコードのリンク</a></p>
    <p class="s-text">※LINEのQRコードから友達登録をしてください。確認出来次第、折り返しパスワードをお教え致します。</p>
    </div>
    <div class="s-box">
    <p><i class="fa fa-twitter fa-4x t-iro" aria-hidden="true"></i></p>
    <h3>Twitter</h3>
    <p><a href="#">ツイッターのリンク</a></p>
    <p>※Twitterをフォローしてください。相互フォロー致します。確認出来次第、折り返しパスワードをお送り致します。</p>
    </div>
  </div>
  </div>
</div>
@endsection
