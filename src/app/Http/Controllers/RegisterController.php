<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register'); // 登録フォームの表示
    }

    public function store(RegisterRequest $request)
    {
        // ユーザーをデータベースに作成
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // パスワードのハッシュ化
        ]);

        // メール認証リンク送信
        $user->sendEmailVerificationNotification();

        // 認証待ち画面にリダイレクト
        return redirect()->route('verification.notice');

        // //ログイン処理
        // auth()->login($user);

        // // 「プロフィール設定画面‗初回ログイン時」へリダイレクト
        // return redirect()->route('home')->with('success', '会員登録が完了しました！');
    }
}
