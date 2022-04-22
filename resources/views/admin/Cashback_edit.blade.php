@extends('layouts.basic')

@section('content-index')
<header class="header">
    <a href="{{ route('home.index') }}"><img src=""></a>
    <nav>
        <ul class="menu">
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="">Todos os Cashback</a></li>
            <li><a href="">Cadastro</a></li>
            <li><a href="">Sair</a></li>
        </ul>
    </nav>
</header>

<body>
    <form action={{ route('cashback.store') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $store->id ?? '' }}">
        @csrf

        <nav class="manager">
            <ul>

                <li><a href="{{ route ('store.index') }}">Cadastro de Lojas</a></li>

                <li><a href="{{ route ('cashback.index') }}">Cadastros de Cashback</a></li>

                <li><a href="{{ route ('list_store.index') }}">Lojas Cadastradas</a></li>

                <li><a href="{{ route ('list_cashback.index') }}">Cashbacks Cadastrados</a></li>

            </ul>
        </nav>

        <div class="main-login">

            <div class="right-login">

                <div class="textfield">
                    <input type="text" name="cashback" value="{{ $store->cashback ?? old('cashback') }}" placeholder="Loja">
                    {{ $errors->has('cashback') ? $errors->first('cashback') : '' }}
                </div>

                <button type="submit" class="btn-login">Editar</button>

                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
        </div>
    </form>
</body>
@endsection