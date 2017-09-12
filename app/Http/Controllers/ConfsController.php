<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;

use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;

use bbs\User;

class ConfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  return view('login.survey');
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
       $user = new User();
       $user = User::where('remember_token',$request->_token)->firstOrfail();
       if($user->password == $request->password) {
         $user->flag = 1;
         $user->save();
         return redirect('/login/survey')->with('flash_message','ご協力をお願いします。');
         //return redirect()->action('SurveysController@show',$user->id)->with('flash_message','ご協力をお願いします。');
       }else {
         return redirect('/login/login')->with('flash_message','パスワードが違います。');
       }
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
