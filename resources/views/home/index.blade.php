@extends('layouts.basic')

@section('content-index')

<h1>Destaques</h1>

<section class="flexbox">
    @foreach ($stores as $store)
    <div>
        <a href="{{ route('app.page.page', $store->id) }}">
            <img src="{{ Storage::url($store->image) }}">
        </a>
    </div>
    @endforeach
</section>
@endsection