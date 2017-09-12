@extends('layouts.default')
@section('content')
<div class="wrapper">
  <h2>タイトル：{{ $post->title }}
	<small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small></h2>
  <p>カテゴリー：{{ $post->cat_id }}</p>
  <p>内容：{{ $post->content }}</p>

  <div class="detail">
      <h3>コメント一覧</h3>
      @forelse($comments as $key=>$single_comment)
      <div class="detail-box">
			<p class="detail-number">NO.{{ $key+1 }}
        <span>{{ $single_comment->commenter }}</span>
        <span>更新日時 {{ date("Y年 m月 d日",strtotime($single_comment->created_at)) }}</span>
      </p>
			<p>{{ $single_comment->comment }}</p>
			<a href="#">返信する</a>
      </div>
      @empty
      <p>コメントはまだありません</p>
      @endforelse
  </div>

  <h3>コメント追加</h3>
  <div class="keijiban">
    <form action="{{action('CommentsController@store', $post->id)}}" method="post">
      {{csrf_field()}}
    <label for="" class="k-name">
      <span>名前：</span>
      <input type="text" placeholder="名無しさん" value="名無しさん" name="commenter">
    </label>
    <label for="" class="k-text">
      <span>本文：</span>
      <textarea name="comment" cols="60" rows="10" required></textarea>
    </label>
      <input type="hidden" value="{{ $post->id }}" name="post_id">
      <input type="submit">
    </form>
  </div>
  <a href="{{url('/posts')}}">戻る</a>
</div>
@endsection
