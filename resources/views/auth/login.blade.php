@extends('layout.app')

@section('content')

    <div style="max-width: 400px; margin: 0 auto; padding-top: 40px;">
        <h1 style="text-align: center">Вход</h1>

        <form action="{{ route('login') }}" method="POST" style="display: flex; flex-direction: column; gap:20px;">
            @csrf
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="login">Логин</label>
                <input class="input" id="login" name="login" type="text">
                @error('login')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="password">Пароль</label>
                <input class="input" id="password" name="password" type="password">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <button class="btn">Войти</button>
        </form>

        <p style="text-align: center">Еще не зарегистрированы? <a style="color: #28A745  !important;" href="{{ route('register') }}">Регистрация</a></p>
    </div>

@endsection