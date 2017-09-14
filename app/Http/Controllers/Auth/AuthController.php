<?php

namespace bbs\Http\Controllers\Auth;

use bbs\User;
use Validator;
use bbs\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * ② ユーザーの作成
     * ユーザーを作成し、確認メールを送信する
     *
     * @param Mailer $mailer
     * @param array $data
     * @param $app_key
     * @return User
     */
    protected function create(Mailer $mailer,array $data)
    {
      $user = new User();
      $email = $user->email = $data->email;
      $password = $user->password = RAND()*100;
      $user->flag = 0;
      $user->remember_token=$data->_token;
      $user->save();

      $this->sendConfirmMail($mailer, $user);

      return $user;

    }

    /**
 * ③ 確認メールの送信
 *
 * @param Mailer $mailer
 * @param User $user
 */


    private function sendConfirmMail(Mailer $mailer, User $user){
    $mailer->send(
        'emails.confirm',
        ['user' => $user, 'token' => $user->confirmation_token],
        function($message) use ($user) {
            $message->to($user->email, $user->name)->subject('ユーザー登録確認');
        }
    );
   }

   /**
 * ④ ユーザー登録アクション
 * バリデーションチェックを行い、ユーザーを作成する
 *
 * @param Request $request
 * @param Mailer $mailer
 * @param Config $config
 * @return \Illuminate\Http\RedirectResponse
 */
public function postRegister(Request $request, Mailer $mailer, Config $config)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }

    $this->create($mailer, $request->all(), $config->get('app.key'));

    \Session::flash('flash_message', 'ユーザー登録確認メールを送りました。');

    return redirect('auth/login');
}

/**
 * ⑤ ユーザーを確認済にする
 *
 * @param $token
 * @return \Illuminate\Http\RedirectResponse
 */
public function getConfirm($token) {
    $user = User::where('confirmation_token', '=', $token)->first();
    if (! $user) {
        \Session::flash('flash_message', '無効なトークンです。');
        return redirect('auth/login');
    }

    $user->confirm();
    $user->save();

    \Session::flash('flash_message', 'ユーザー登録が完了しました。ログインしてください。');
    return redirect('auth/login');
}



}
