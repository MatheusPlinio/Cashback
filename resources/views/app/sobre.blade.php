@extends('layouts.basic')

@section('content-index')
<header class="header">
    <a href="{{ route ('site.index') }}"><img src="/img/money-logo.png"></a>
    <nav>
        <ul class="menu">
            <li><a href="{{ route ('app.sobre') }}">Sobre</a></li>
            <li><a href="{{ route ('app.contato')}}">Contato</a></li>
            <li><a href="{{ route ('app.todocashback') }}">Todos os Cashback</a></li>
            <li><a href="{{ route ('app.sair') }}">Sair</a></li>
        </ul>
    </nav>
</header>

@endsection