@extends('layouts.basic')

@section('content-index')


<form action="{{ route ('admin.store.store') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $store->id ?? '' }}">
    @csrf

        <div class="textfield">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Loja">
            {{ $errors->has('name') ? $errors->first('name') : '' }}
        

        
            <input type="text" name="link" value="{{ old('link') }}" placeholder="Link">
            {{ $errors->has('link') ? $errors->first('link') : '' }}
        

        
            <input type="file" name="image" value="{{ old('image') }}" placeholder="Arquivo">
            {{ $errors->has('image') ? $errors->first('image') : '' }}
        </div>

        <button type="submit" class="btn-admin">Cadastrar</button>

        @if (session('success'))
        <p class="message">{{ session('success') }}</p>
        @endif

</form>
@endsection