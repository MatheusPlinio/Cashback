@extends('layouts.basic')

@section('content-index')

<body>

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
                            <td><a href="{{ route('admin.cashback.edit', ['store' => $store->id]) }}">Editar</a></td>
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