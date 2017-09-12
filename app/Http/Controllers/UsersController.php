<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;

use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;

use bbs\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('login.login');
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
       $user = new User();;
       $email = $user->email = $request->email;
       $password = $user->password = RAND()*100;
       $user->flag = 0;
       $user->remember_token=$request->_token;
       $user->save();
       $id=User::all()->last()->id;
       mb_send_mail($email, 'メール認証', "メール認証コード  {$password}", 'From: keiziban');

       return redirect('/login/login/')->with([
         'flash_message'=> 'メールをお送りしました。メールに記載されたメール認証コードを入力してください。',
         "id"=>$id,
        ]);
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
