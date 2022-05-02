<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    <title>O Melhor Cashback</title>

    <header class="header">

        <li><a href="{{route('home.index')}}"><img src="{{Storage::url('Images_statics/money.png')}}" alt=""></a></li>

        <nav class="manager">
            <ul>
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>

                <li><a href="{{ route('register') }}">Cadastro</a></li>
                @endguest

                @if(auth()->check() && auth()->user()->Admin)
                <li>
                    <a href="#">Admin</a>
                    <ul>

                        <li><a href="{{ route ('admin.shop.show') }}">Programas</a></li>

                        <li><a href="{{ route ('admin.store.show') }}">Lojas</a></li>

                    </ul>
                </li>
                @endif

                @auth
                <li>
                    <a href="#">Perfil</a>
                    <ul>
                        <li>
                            <a href="{{ route('app.on.index') }}">Sobre</a>
                        </li>

                        <li>
                            <a href="{{ route('app.contact.index') }}">Contato</a>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </nav>
    </header>
</head>

<body>

    @yield('content-index')

</body>

<footer class="footer">

    <p>O Melhor Cashback - Copyright - {{ date("Y") }}</p>

</footer>

</html>