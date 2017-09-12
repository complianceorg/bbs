<?php

namespace bbs;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $guarded = ['id'];

  public function Post(){
    // コメントは1つの投稿に属する
    return $this->belongsTo('bbs\Post','id');
  }
}
