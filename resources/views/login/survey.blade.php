@extends('layouts.default')
@section('content')
<div class="wrapper">
<div class="head"><h2>BOに関する簡単アンケート</h2></div>
<div class="ankerto-box">
<div class="ankerto-text">
	<p>■BOに関する簡単なアンケートにお答えください。</p>
	<form action= {{ url('/posts/survey') }} method="post">
		{{csrf_field()}}
		<h3>年齢<span class="aka" >※必須</span></h3>
		<label>
			<input type="radio" name="age" class="radio01-input" required>
			<span class="radio01-parts">20代</span>
		</label>
		<label>
			<input type="radio" name="age" class="radio01-input">
			<span class="radio01-parts">30代</span>
		</label>
		<label>
			<input type="radio" name="age" class="radio01-input">
			<span class="radio01-parts">40代</span>
		</label>
		<label>
			<input type="radio" name="age" class="radio01-input">
			<span class="radio01-parts">50代以上</span>
		</label>
		<h3>性別<span class="aka">※必須</span></h3>
		<label>
			<input type="radio" name="sex" class="radio01-input" required>
			<span class="radio01-parts">男性</span>
		</label>
		<label>
			<input type="radio" name="sex" class="radio01-input">
			<span class="radio01-parts">女性</span>
		</label>
		<h3>ご職業<span class="aka">※必須</span></h3>
		<label>
			<input type="radio" name="job" class="radio01-input" required>
			<span class="radio01-parts">会社員</span>
		</label>
		<label>
			<input type="radio" name="job" class="radio01-input">
			<span class="radio01-parts">自営業</span>
		</label>
		<label>
			<input type="radio" name="job" class="radio01-input">
			<span class="radio01-parts">学生</span>
		</label>
		<label>
			<input type="radio" name="job" class="radio01-input">
			<span class="radio01-parts">その他</span>
		</label>
		<h3>現在どこのBO業者を利用していますか？<span class="aka">※必須</span></h3>
		<label>
			<input type="checkbox" name="kaigaibo" value="highlow" checked="checked" class="check-input" required>
			<span class="check-name">ハイローオーストラリア</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="thebinary" class="check-input">
			<span class="check-name">ザ・バイナリー</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="fivestaroption" class="check-input">
			<span class="check-name">ファイブスターズオプション</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="jetoption" class="check-input">
			<span class="check-name">ジェットオプション</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="trade200" class="check-input">
			<span class="check-name">トレード200</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="optionbit" class="check-input">
			<span class="check-name">オプションビット</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="fxbinary" class="check-input">
			<span class="check-name">fxbinary</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="sonickoption" class="check-input">
			<span class="check-name">ソニックオプション</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="theoption" class="check-input">
			<span class="check-name">theoption</span>
		</label>
		<label>
			<input type="checkbox" name="kaigaibo" value="BToption" class="check-input">
			<span class="check-name">BToption</span>
		</label>
	{{--	<input type="hidden" name="id" value="{{$user->id or 'default'}}">--}}
		<input class="sousin" type="submit" value="送信">
	</form>
</div>
</div>
@endsection
