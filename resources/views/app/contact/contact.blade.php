@extends('layouts.basic')

@section('content-index')
<header class="header">
    <a href="{{ route('home.index') }}"><img src=""></a>
    <nav>
        <ul class="menu">
            <li><a href="{{ route('app.on.index') }}">Sobre</a></li>
            <li><a href="{{ route('app.contato.index') }}">Contato</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Cadastro</a></li>

        </ul>
    </nav>
</header>
@endsection