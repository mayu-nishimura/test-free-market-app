<?php

namespace App\Http\Controllers;

use App\Hppt\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // ログイン画面を表示するメソッド
    public function login()
    {
        return view('auth.login');
    }

    // 認証処理を行うメソッド
    public function authenticate(LoginRequest $request)
    {
        // バリデーションしたデータを取得
        $credentials = $request->validated();

        // 認証試行
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/'); // 成功時のリダイレクト
        }

        // 認証失敗時の処理
        return back()->withErrors([
            'email' => 'ログイン情報が登録されていません',
            'password' => 'ログイン情報が登録されていません',
        ]);
    }
}
