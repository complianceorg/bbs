<?php
use Illuminate\Http\Request;
use bbs\Http\Requests;
use bbs\Http\Controllers\Controller;
use bbs\User;

Route::resource('/posts','PostsController');
Route::resource('/posts/single', 'CommentsController');

Route::resource('/login/signup', 'UsersController');
Route::resource('/login/conf', 'ConfsController');
Route::resource('/login/survey', 'SurveysController');

Route::get('/login/login', function () {
    return view('login.login');
});
Route::get('/login/logout', function () {
        Session::forget('SignupOrView');
        return view('login.logout');
});

Route::post('/login/conf2', function (Request $request){
    $user = new User();
    $user = User::where('email',$request->email)->first();
    if (! $user) {
        \Session::flash('flash_message', 'このメールアドレスは登録されていません。登録をおねがいします。');
        return redirect('login/login');
    }
    if($user->flag == 1) {
      Session::put('SignupOrView','View');
      return redirect('/posts')->with('flash_message','ようこそ');
    }else {
      return redirect('/login/signup')->with('flash_message','認証されていません。もう一度登録をお願いします。');
    }
});


Route::get('/login/signupab', function (){
    Session::forget('LoginOrView');
    return redirect('/login/signup');
});
// Route::post('/posts/reply', function (Request $request, $id){
//     $reply="<<".$request->reply ."&lt;br&gt;";
//       return redirect()->action('CommentsController@show',$id)->with('reply',$reply);
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });
