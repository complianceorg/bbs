<?php

namespace bbs;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = ['id'];
  public function Posts(){
    // カテゴリーはたくさんの投稿を持つ
    return $this->hasMany('bbs\Post', 'name');
  }
}
