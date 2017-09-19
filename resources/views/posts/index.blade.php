@extends('layouts.default')

@section('content')
<div class="wrapper">
<div class="tool">
<p>ツールが入る</p>
</div>
<div class="sitecategory">
 <h2>カテゴリー一覧</h2>
    <ul>
      @forelse($categories as $category)
      <li><a href="#{{$category->name}}">{{ $category->name }}</a></li>
      @empty
      <p>No categories</p>
      @endforelse
    </ul>
  </div>
  <div class="keijiban">
      <h2>ー  新しいスレッドを立てる  ー</h2>
    <form action= {{ url('/posts') }} method="post">
      {{csrf_field()}}
    <label for="" class="k-name">
      <span>カテゴリ:</span>
      <select name="cat_id">
         @foreach($categories as $category)
        <option value="{{ $category->name}}">{{ $category->name }}</option>
        @endforeach
      </select>
    </label>
    <label for="" class="">
      <span>タイトル:</span>
      <input type="text" name="title" size="40" required>
    </label>
    <label for="" class="k-text">
      <span>内容:</span>
      <textarea name="content" id="" cols="110" rows="10" required></textarea>
    </label>
      <input type="submit">
    </form>
  </div>
  <div class="detail">
    <h2>ー  既存のスレッド一覧  ー</h2>
<?php foreach ($existcat as $key => $category) {
        echo <<< EOM
        <h3>◆カテゴリー：{$category['cat_id']}</h3>
        <div class="detail-box2">
        <div class="detail-box" id="{$category['cat_id']}">

EOM;
      foreach ($posts["{$category['cat_id']}"] as $key => $post) {
        echo <<< EOM
        <div class="detail-wrap">
        <p class="detail-number">
        <span>■タイトル：{$post['title']}</span>
        </p>
        <p class="detail-content">内容：{$post['content']}</p>
        <a href="./posts/single/{$post['id']}">このスレッドを読む</a>
        </div>

EOM;
}
echo "</div>";
echo "</div>";
}
?>
  </div>
</div>
  @endsection
