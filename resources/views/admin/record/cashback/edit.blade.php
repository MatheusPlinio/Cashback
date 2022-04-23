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
            <li><a href="{{ route('admin.store.index') }}">Cadastro de Lojas</a></li>

            <li><a href="{{route ('admin.shop.index')}}">Cadastros de Cashback</a></li>

            <li><a href="{{ route ('admin.store.show') }}">Lojas Cadastradas</a></li>

            <li><a href="{{ route ('admin.shop.show') }}">Cashbacks Cadastrados</a></li>
        </ul>
    </nav>


    <thead>
        <tr>
            <th>Store</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $store->name }}</td>
        </tr>

    </tbody>
    </table>


    @component('admin.record.cashback._components.form_cashback_edit', ['cashbacks' => $cashbacks, 'store' => $store])
    @endcomponent
</body>
@endsection