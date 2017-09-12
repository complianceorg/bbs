<?php

use Illuminate\Database\Seeder;
use bbs\Post;
use bbs\Comment;
use bbs\Category;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

    	$commentdammy = 'コメントダミーです。';

    	for( $i = 1 ; $i <= 10 ; $i++) {
    		$post = new Post;
    		$post->title = "$i 番目の投稿";
    		$post->content = $content;
    		$post->cat_id = 1;
    		$post->save();

    		$maxComments = mt_rand(3, 15);
    		for ($j=0; $j <= $maxComments; $j++) {
    			$comment = new Comment;
    			$comment->commenter = '名無しさん';
    			$comment->comment = $commentdammy;

    			// モデル(Post.php)のCommentsメソッドを読み込み、post_idにデータを保存する
    			$post->comments()->save($comment);
    			$post->increment('comment_count');
        }
      }

      // カテゴリーを追加する
        $cat1 = new Category;
        $cat1->name = "バイナリーオプション";
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "fxbinary";
        $cat2->name_english = "fxbinary";
        $cat2->save();

    }
}
