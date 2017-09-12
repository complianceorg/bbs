<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;

use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;
use bbs\Post;
use bbs\Category;
use bbs\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $comment = new Comment(['commenter' =>$request->commenter,
                              'post_id'   =>$request->post_id,
                              'comment'   =>$request->comment,
      ]);;
      $comment->save();
      $id=$comment->post_id;

      //return redirect('Comments/single/{$id}')->with('flash_message','新規スレッドを作成しました');
      return redirect()->action('CommentsController@show',$id)->with('flash_message','コメントを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      # 例 : SELECT * FROM Posts WHERE id = $id
      $post = Post::find($id);
      $comments=Comment::where('post_id',$id)->get();
      //$comments=Comment::where('post_id',$id)->latest()->get();
      return view('posts.single', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      $comments=Comment::where('post_id',$id)->get();
      //$comments=Comment::where('post_id',$id)->latest()->get();

      //$reply="<<".$request->replyid ."&lt;br&gt;";
      $reply="<<".$request->replyid;
      return view('posts.single', compact('post', 'comments','reply'));
        //return url('/posts/single',$id)->with('reply',$reply);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
