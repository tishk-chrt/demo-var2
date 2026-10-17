<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Конференции.РФ</title>
    <style>
        @font-face {
            font-family: Roboto;
            src: url('/fonts/Roboto-Regular.ttf');
            font-weight: 400;
        }

        @font-face {
            font-family: Roboto;
            src: url('/fonts/Roboto-Bold.ttf');
            font-weight: 700;
        }

        a {
            text-decoration: none;
            color: #343A40;
        }

        .btn {
            color: white;
            background: #343A40;
            padding: 10px 20px;
            outline: none;
            stroke: none;
            border: none;
        }

        .input {
            padding: 5px 10px;
        }
    </style>
</head>

<body style="font-family: Roboto;">
    <header style="padding-top: 10px; max-width: 1200px; margin: 0 auto;">
        <div style="display: flex; align-items: center; justify-content: space-between; co  lor: #343A40 ">
            <a href=""
                style="display: flex; align-items: center; gap: 10px; font-size: 24px; font-weight: 700; color: #343A40 ;">
                <img style="width: 40px" src="{{ asset('img/logo.jpg') }}" alt="logo">
                Конференции.РФ
            </a>
            <nav style="display: flex; gap: 10px">
                @auth
                    <a class="btn" href="{{ route('cabinet') }}">Мои заявки</a>
                    <form action="{{ route('logout') }}">
                        @csrf
                        <button>Выйти</button>
                    </form>
                @else
                    <a class="btn" href="{{ route('login') }}">Войти</a>
                    <a class="btn" href="{{ route('register') }}">Зарегистрироваться</a>
                @endauth
            </nav>
        </div>
    </header>

    <main style=" max-width: 1200px; margin: 0 auto;">
        @if (session('success'))
            <div style="color: #28A745">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>

</html>