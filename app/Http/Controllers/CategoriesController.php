<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;

use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;
use bbs\Category;
use bbs\Post;
use bbs\Http\Requests\PostRequest;

class CategoriesController extends Controller
{
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index()
    {
      $categories = Category::all();
      //$categories = Category::latest('created_at')->get();
      //$posts = Post::all();
      // return view('posts.index')->with([
      //     'posts' => $posts,
      //     'categories' =>$categories,
      // ]);
      return view('posts.index')->with('categories','$categories');
//      return view('posts.index',compact('categories','posts'));
//        return view('posts.index')->with('categories', $categories);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
