@extends('layouts.basic')

@section('content-index')
<div class="home-container">
    <form action="/" method="get" enctype="multipart/form-data">
        <div class="search">
            <input type="text" id="search" name="search" placeholder="Procurar Loja">
        </div>
        @if($search)
        <h3>Buscando por: {{$search}}</h3>
        @else
        <h1>Destaques</h1>
        @endif
        @if(count($stores) == 0 && $search)
        <h3>Não há lojas com este nome</h3>
        @endif

        <div class="flexbox">
            @foreach ($stores as $store)
            <div>
                <a href="{{ route('app.page.page', $store->id) }}">
                    <img src="{{ Storage::url($store->image) }}">
                    <p>{{$store->name}}</p>
                </a>
            </div>
            @endforeach
        </div>
</div>
</form>
@endsection