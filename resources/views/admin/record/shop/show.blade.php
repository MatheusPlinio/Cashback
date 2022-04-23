@extends('layouts.basic')

@section('content-index')

<body>
    <form action={{ route('admin.shop.show') }} method="post" enctype="multipart/form-data">
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
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="cashback">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <button type="submit" class="btn-list">pesquisar</button>

                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>Cashback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->name }}</td>
                                <td>Excluir</td>
                                <td><a href="{{ route('admin.cashback.edit', $store->id) }}">Editar</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
@endsection