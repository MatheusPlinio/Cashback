@extends('layouts.basic')

@section('content-index')
<div class="container">
    <form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="main-login">

            <div class="textfield">

                <input type="text" name="name" value="{{ old('name') }}" placeholder="Loja">
                {{ $errors->has('name') ? $errors->first('name') : '' }}

                <input type="file" name="logo" value="{{ old('logo') }}" placeholder="logo">
                {{ $errors->has('logo') ? $errors->first('logo') : '' }}

                <button type="submit" class="btn-admin">Cadastrar</button>

                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
        </div>
    </form>
</div>
@endsection