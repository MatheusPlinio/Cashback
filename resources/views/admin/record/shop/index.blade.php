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
    <form action={{ route('admin.shop.store') }} method="POST" enctype="multipart/form-data">
        @csrf

        <nav class="manager">
            <ul>
                <li><a href="{{ route('admin.store.index') }}">Cadastro de Lojas</a></li>

                <li><a href="{{route ('admin.shop.index')}}">Cadastros de Cashback</a></li>

                <li><a href="{{ route ('admin.store.show') }}">Lojas Cadastradas</a></li>

                <li><a href="{{ route ('admin.shop.show') }}">Cashbacks Cadastrados</a></li>
            </ul>
        </nav>

        <div class="main-login">

            <div class="right-login">

                <div class="textfield">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Loja">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <div class="textfield">
                    <input type="file" name="logo" value="{{ old('logo') }}" placeholder="logo">
                    {{ $errors->has('logo') ? $errors->first('logo') : '' }}
                </div>

                <button type="submit" class="btn-login">Cadastrar</button>

                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
        </div>
    </form>
</body>
@endsection