@extends('layout.app')

@section('content')

    <div style="max-width: 400px; margin: 0 auto; padding-top: 40px;">
        <h1 style="text-align: center">Регистрация</h1>

        <form action="{{ route('register') }}" method="POST" style="display: flex; flex-direction: column; gap:20px;">
            @csrf
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="fio">Фио</label>
                <input class="input" id="fio" name="fio" type="text">
                @error('fio')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="phone">Телефон</label>
                <input class="input" id="phone" name="phone" type="tel" placeholder="+79999999999">
                @error('phone')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="email">Емейл</label>
                <input class="input" id="email" name="email" type="email">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; flex-direction: column; gap:5px">
                <label for="register">Логин</label>
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

            <button class="btn">Зарегистрироваться</button>
        </form>

        <p style="text-align: center">Уже есть аккаунт? <a style="color: #28A745 !important;" href="{{ route('login') }}">Войти</a></p>
    </div>

@endsection