@extends('layouts.basic')

@section('content-index')

<head>
    <section class="flexbox-redirect">
    <div>
    <meta http-equiv="refresh" content="6; url={{$store->pivot->link}}">
    <img src="{{ Storage::url($store->logo) }}">
    </div>
    <h3>redirecionando</h3>
    </section>
    
    
</head>


<body>
</body>

@endsection