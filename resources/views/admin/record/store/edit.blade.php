@extends('layouts.basic')

@section('content-index')

<div class="container">
    <form action="{{ route('admin.store.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $store->id ?? '' }}">
        @csrf
        <div class="main-login">
            <div class="right-login">
                <div class="textfield">
                    <input type="text" name="name" value="{{ $store->name ?? old('name') }}" placeholder="Loja">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="link" value="{{ $store->link ?? old('link') }}" placeholder="Link">
                    {{ $errors->has('link') ? $errors->first('link') : '' }}

                    <button type="submit" class="btn-login">Editar</button>
                </div>
                @if (session('success'))
                <p class="message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
</div>
</form>
</div>

@endsection