@extends('layouts.basic')

@section('content-index')

<body>
    <form action={{ route('admin.shop.store') }} method="POST" enctype="multipart/form-data">
        @csrf

        <div class="main-login">

            <div class="right-login">

                <div class="textfield">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Loja">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>

                <div class="textfield">
                    <input type="file" name="logo" value="{{ old('logo') }}" placeholder="logo">
                    {{ $errors->has('logo') ? $errors->first('logo') : '' }}
                </div>

                <button type="submit" class="btn-login">Cadastrar</button>

                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
        </div>
    </form>
</body>
@endsection