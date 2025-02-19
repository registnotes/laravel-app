<?php

//自作

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    * @return View
    */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /*
    * @param App\Http\Requests\LoginFormRequest
    */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // デバッグ用: 取得した認証情報をログに出力
        //\Log::info('Attempting to login with credentials:', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('tweet.index')->with('success', 'ログイン成功しました！');
        }

        return back()->withErrors([
            'danger' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }



    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('showLogin')->with('danger', 'ログアウトしました！');
    }
}
