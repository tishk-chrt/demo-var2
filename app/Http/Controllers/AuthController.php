<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'login' => 'required|min:6|unique:users,login',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'fio' => 'required',
            'phone' => 'required'
        ],[
            'required' => 'Это поле обязательное',
            'email.email' => 'Введите корректный емейл',
            'login.min' => 'Логин минимум от 6 символов',
            'login.unique' => 'Пользователь с таким логинов уже есть',
            'password.min' => 'Пароль минимум от 8 символов'
        ]);

        /* $data['password'] = Hash::make($data['password']); */
        $user = User::create($data);

        Auth::login($user);

        return redirect('/cabinet');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ],[
            'required' => 'Это поле обязательное',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/cabinet');
        }

        return back()->withInput()->withErrors(['login' => 'Неверный логин или пароль']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
