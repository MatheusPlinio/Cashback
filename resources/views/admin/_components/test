<form action="{{ route ('cashback_to_add.store', ['store' => $store]) }}" method="post">
    @csrf

    <select name="cashback_id">
        <option>-- Selecione Um Cashback --</option>

        @foreach( $cashbacks as $cashback )
        <option value="{{ $cashback->id }}" {{ old('cashback_id') == $cashback->id ? 'selected' : ''}}>{{ $cashback->cashback }}</option>
        @endforeach
    </select>
    {{$errors->has('cashback_id') ? $errors->first('cashback_id') : ''}}

    <input type="decimal" name="perc_cashback" value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="Porcentagem">
    {{ $errors->has('perc_cashback') ? $errors->first('perc_cashback') : '' }}
    <button type="submit">Adicionar</button>

    @if (session('success'))
    <p class="message">{{ session('success') }}</p>
    @endif
</form>