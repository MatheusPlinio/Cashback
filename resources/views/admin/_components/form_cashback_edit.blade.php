<form method="post" action="{{ route('update.store', ['store' => $store]) }}">
@csrf
    
    <select name="cashback">
        <option>-- Selecione um Produto --</option>

        @foreach($cashbacks as $cashback)
        <option value="{{ $cashback->id }}" {{ old('cashback_id') == $cashback->id ? 'selected' : '' }}>{{ $cashback->name }}</option>
        @endforeach
    </select>
    {{ $errors->has('cashback_id') ? $errors->first('cashback') : '' }}

    <input type="number" name="perc_cashback" value="{{ old('perc_cashback') ? old('perc_cashback') : '' }}" placeholder="Quantidade" class="borda-preta">
    {{ $errors->has('perc_cashback') ? $errors->first('perc_cashback') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>

    @if (session('success'))
    <p class="message">{{ session('success') }}</p>
    @endif

</form>