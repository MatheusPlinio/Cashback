@extends('layouts.basic')

@section('content-index')

<body>
    <form action="{{ route('admin.store.show') }}"method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-login">

            <div class="right-login">

                <div class="textfield">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Loja">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <button type="submit" class="btn-list">pesquisar</button>

                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->name }}</td>
                                <td>{{ $store->link }}</td>
                                <td>
                                    <form id="form_{{$store->id}}" action="{{ route('admin.store.destroy', ['store' => $store->id]) }}" method="post">
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$store->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('admin.store.edit', $store->id) }}">Editar</a></td>
                            </tr>
                            @endforeach
                            <li><a href="{{ route('admin.store.index') }}">Adicionar Loja</a></li>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
@endsection