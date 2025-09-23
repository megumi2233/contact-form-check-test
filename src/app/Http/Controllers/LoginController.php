<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログインフォーム表示
    public function showForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスはメール形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);

        // 認証処理
        if (Auth::attempt($validated)) {
            // 認証成功 → ホームへリダイレクト
            return redirect()->route('home')->with('success', 'ログインしました');
        }

        // 認証失敗 → エラーメッセージを返す
        return back()->withErrors([
            'login' => 'メールアドレスまたはパスワードが正しくありません',
        ])->withInput();
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'ログアウトしました');
    }
}
