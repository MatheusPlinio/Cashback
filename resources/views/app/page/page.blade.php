@extends('layouts.basic')

@section('content-index')

<div class="container-page">
    <div class="store_container">
        <div class="store_cash">
            <p><img src="{{ Storage::url($store->image) }}">{{ $store->name }}</p>
        </div>
        <div class="store-mobile">
            <p><img src="{{ Storage::url($store->image) }}">{{ $store->name }}</p>
        </div>
        <div class="container_info">
            <dt>1. Escolha a Oferta</dt>
            <dt>Selecione o cupom de desconto ou clique em "Ativar cashback"</dt>
            <br>
            <dt>2. Faça Login/Cadastre-se</dt>
            <dt>Esteja logado em nosso site, se não estiver ou não tem cadastro <a href="">clique aqui</a> </dt>
            <br>
            <dt>3. Redirecionamento</dt>
            <dt>Apos escolher sua oferta você será redirecionado para a página da oferta</dt>
        </div>
    </div>
    @if(auth()->check() && auth()->user()->Admin)
    <div class="btn-add-cashback">
        <a href="{{ route('admin.cashback.index', ['store' => $store]) }}">Adicionar Cashback</a>
    </div>
    @endif

    <h2>Cashbacks</h2>

    <div class="flexbox">
        @foreach ($store->cashbacks as $store)
        <div>
            <a href="{{$store->pivot->link}}">
                <img src="{{ Storage::url($store->logo) }}">
                <p>{{number_format($store->pivot->perc_cashback, 2, ',', '')}}%</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection