<?php

namespace bbs;

use Illuminate\Database\Eloquent\Model;
use bbs\Post;
use bbs\Category;
use bbs\Comment;
class Post extends Model
{
  protected $guarded = ['id'];
  public function Comments(){
    // 投稿はたくさんのコメントを持つ
    return $this->hasMany('bbs\Comment', 'post_id');
  }

  public function Category(){
    // 投稿は1つのカテゴリーに属する
    return $this->belongsTo('bbs\Category','cat_id','name');
  }
}
