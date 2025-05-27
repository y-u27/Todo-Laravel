<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログインフォーム表示
    public function showLogin() {
        return view('login');
    }

    // ログイン
    public function login(Request $request) {
        // リクエストデータ検証
        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        // 認証成功
        if (Auth::attempt($validated, false)) {
            $request->session()->regenerate();

            return redirect('/todos');
        }

        // 認証失敗
        return back()->withErrors([
            'email' => 'メールアドレスが違います',
            'password' => 'パスワードが違います'
        ])->onlyInput('email', 'password');
    }

    
}
