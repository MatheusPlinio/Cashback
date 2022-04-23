@extends('layouts.basic')

@section('content-index')
<header class="header">
    <a href="{{ route ('home.index') }}"><img src="/img/money-logo.png"></a>
    <nav>
        <ul class="menu">
            <li><a href="{{ route('app.on.index') }}">Sobre</a></li>
            <li><a href="{{ route('app.contato.index') }}">Contato</a></li>
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Cadastro</a></li>
            @endguest
        </ul>
    </nav>
</header>

@endsection