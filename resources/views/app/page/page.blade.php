@extends('layouts.basic')

@section('content-index')
<body>
    <div class="store_container">
        <div class="store_cash">
            <a href="{{ url($store->link) }}"> <img src="{{ Storage::url($store->image) }}">{{ $store->name }}
            </a>
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
    <li><a href="{{ route('admin.cashback.index', ['store' => $store]) }}">Adicionar Cashback</a></li>
    @endif



</body>
@endsection