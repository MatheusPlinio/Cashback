@extends('layouts.basic')

@section('content-index')


    <thead>
        <tr>
            <th>Store</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $store->name }}</td>
        </tr>

    </tbody>
    </table>


    @component('admin.record.cashback._components.form_cashback_edit', ['cashbacks' => $cashbacks, 'store' => $store])
    @endcomponent

@endsection