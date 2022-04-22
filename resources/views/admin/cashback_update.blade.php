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

        <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>E-Commerce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->name}}</td>
                                <td><a href="{{ route('cashback_add.edit', ['store' => $store->id]) }}">Editar</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                

            @if (session('success'))
            <p class="message">{{ session('success') }}</p>
            @endif
        </div>
    </div>
    </div>
    </form>
</body>
@endsection