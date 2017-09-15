<?php

namespace bbs\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;

use Validator;
use bbs\User;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('login.survey');
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



    // バリデーションのルール
    public $validateRules = [
      'age' => 'required',
      'sex' => 'required',
      'job' => 'required'
    ];
    // バリデーションのエラーメッセージ
    public $validateMessages = [
      'age.required' => '年齢を選択してください。',
      'sex.required' => '性別を選択してください。',
      'job.required' => 'ご職業を選択してください。',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       $user = new User();

       //バリデーション
       $val = Validator::make(
           $request->all(),
           $this->validateRules,
           $this->validateMessages
       );

       //バリデーションNGの場合
      if($val->fails()){
          return redirect('/login/survey')->withErrors($val)->withInput();
      }

      //バリデーションOKの場合
       $user = User::where('remember_token',$request->_token)->first();

       if (! $user) {
           \Session::flash('flash_message', '無効なトークンです。ユーザー登録をお願いします。');
           return redirect('login/signup');
       }

       $user->age = $request->age;
       $user->sex = $request->sex;
       $user->job = $request->job;


       $kaigaiboImp = implode(',',$request->kaigaibo);
       $user->kaigaibo = $kaigaiboImp;

       $user->save();

       Session::put('SignupOrView','View');
       return redirect('/posts')->with('flash_message','ご協力ありがとうございました。');
   }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('login.survey');
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
