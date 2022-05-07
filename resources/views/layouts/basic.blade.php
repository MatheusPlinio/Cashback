<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    <title>O Melhor Cashback</title>

    <header>
        <nav>
            <ul>
                <li> <a href="/"> <img src="{{Storage::url('Images_statics/money.png')}}"></a>
                    <div class="sub-menu-1">
                        <ul>
                            @guest
                            <li class="home"><a href="{{ route('login') }}">Login</a></li>
                            <li class="home"><a href="{{ route('register') }}">Cadastro</a></li>
                            @endguest

                            @auth
                            <li><a href="#">+info</a></li>

                            <li> <a href="{{ route('app.contact.index') }}">Contato</a> </li>

                            @if(auth()->check() && auth()->user()->Admin)
                            <li><a href="{{ route ('admin.shop.show') }}">Programas</a></li>

                            <li><a href="{{ route ('admin.store.show') }}">Lojas</a></li>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Sair</button>
                            </form>
                            @endauth
                    </div>
                </li>


            </ul>


            </ul>
        </nav>
    </header>
</head>

<body>

    @yield('content-index')

</body>

<footer>

    <p>O Melhor Cashback - Copyright - {{ date("Y") }}</p>

</footer>

</html>