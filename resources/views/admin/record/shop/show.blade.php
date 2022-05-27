@extends('layouts.basic')

@section('content-index')

<body>
    <form action="{{ route('admin.shop.show') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-login">

            <div class="right-login">

                <div class="search">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="cashback">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <button type="submit" class="btn-list">pesquisar</button>
    </form>
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
                    <td>
                        <form id="form_{{$store->id}}" action="{{ route('admin.shop.destroy', ['store' => $store->id]) }}" method="post">
                            @csrf
                            <a href="#" onclick="document.getElementById('form_{{$store->id}}').submit()">Excluir</a>
                        </form>

                    </td>
                    <td><a href="{{ route('admin.cashback.edit', $store->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
            <a href="{{ route('admin.shop.index') }}">Adicionar Loja</a>
        </table>
    </div>
    </div>
    </div>
</body>
@endsection