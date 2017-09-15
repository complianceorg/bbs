<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;

use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;
use bbs\Post;
use bbs\Category;
use bbs\Comment;
use bbs\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index()
    {
      if (session()->has('SignupOrView')) {
      $posts  = Post::all()->groupBy('cat_id')->toArray();
      $existcat=Post::distinct()->select('cat_id')->get();
      $categories = Category::all();
      return view('posts.index', compact('posts','categories','existcat'));

      }else{
      return redirect('/login/signup');
      }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new Post();
      $title = $post->title = $request->title;
      $cat_id = $post->cat_id = $request->cat_id;
      $content = $post->content = $request->content;
      $post->save();
      $id=Post::all()->last();

      return redirect()->action('PostsController@show',$id->id)->with('flash_message','新規スレッドを作成しました');
      //return redirect('/posts')->with('flash_message','新規スレッドを作成しました');

      //  return view('posts.single{$post_id}')->with([
      //    'flash_message'=> '新規スレッドを作成しました',
      //    "post"=>$email,
      //   ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (session()->has('SignupOrView')) {
        $post = Post::find($id);
        $comments=Comment::where('post_id',$id)->latest()->get();
        return view('posts.single', compact('post', 'comments'));

      }else{
      return redirect('/login/signup');
      }

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
