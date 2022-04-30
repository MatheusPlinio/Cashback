@extends('layouts.basic')

@section('content-index')

<body>

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
                            <td><a href="{{ route('admin.cashback.edit', ['store' => $store->id]) }}">Adicionar</a></td>
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