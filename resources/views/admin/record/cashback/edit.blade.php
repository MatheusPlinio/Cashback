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