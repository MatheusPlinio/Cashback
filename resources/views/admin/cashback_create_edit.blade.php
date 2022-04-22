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

    
    


    @component('admin._components.form_cashback_edit', ['cashbacks' => $cashbacks, 'store' => $store])
    @endcomponent

</body>
@endsection