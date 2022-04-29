@extends('layouts.basic')

@section('content-index')

<body>
    <form action="{{ route('admin.cashback.store') }} "method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $store->id ?? '' }}">
        @csrf

        <div class="main-login">

            <div class="right-login">

                <div class="textfield">
                    <input type="text" name="name" value="{{ $store->name ?? old('name') }}" placeholder="Loja">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <button type="submit" class="btn-login">Editar</button>

                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
        </div>
    </form>
</body>
@endsection