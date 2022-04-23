@extends('layouts.basic')

@section('content-index')
    <header class="header">
        <a href="{{route('home.index')}}"><img src="image/logo.png"></a>
        <nav>
            <ul class="menu">
                <li><a href="{{ route('app.on.index') }}">Sobre</a></li>
                <li><a href="{{ route('app.contato.index') }}">Contato</a></li>
                @guest<li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Cadastro</a></li>
                @endguest
            </ul>
        </nav>
    </header>

    <h1>Destaques</h1>

    <section class="flexbox">
        @foreach ($stores as $store)
            <div>
                <a href="{{ route('app.page.page', $store->id) }}">
                    <img src="{{ Storage::url($store->image) }}">
                </a>
            </div>
        @endforeach
    </section>
@endsection
