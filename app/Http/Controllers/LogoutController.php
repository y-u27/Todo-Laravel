<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // ログアウト
    public function logout(Request $request)
    {
        // ユーザーログアウト
        Auth::logout();

        // セッション無効
        $request->session()->invalidate();

        // 新しいcsrfトークン再生成
        $request->session()->regenerateToken();

        // ログインフォームへリダイレクト
        return redirect('/login')->with('message', 'ログアウトしました');
    }
}
