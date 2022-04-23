<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    <title>O Melhor Cashback</title>



</head>

<header class="header">
    <a href="{{route('home.index')}}"><img src="{{ Storage::url('Images_statics/logo.png') }}"></a>
    <nav>
        <ul class="menu">
            @if(auth()->check() && auth()->user()->Admin)
            <li><a href="{{ route('admin.store.index') }}">Admin</a></li>
            @endif
            <li><a href="{{ route('app.on.index') }}">Sobre</a></li>
            <li><a href="{{ route('app.contact.index') }}">Contato</a></li>
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Cadastro</a></li>
            @endguest
        </ul>
    </nav>
</header>

<body>
    @yield('content-index')
</body>

</html>