<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Store;
use Illuminate\Http\Request;

class CashbackController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('admin.record.cashback.index', ['stores' => $stores]);
    }

    public function edit(Store $store)
    {
        $cashbacks = Cashback::all();

        Return view ('admin.record.cashback.edit', ['store' => $store, 'cashbacks' => $cashbacks]);
    }

    public function store(Request $request, Store $store)
    {
        $regras =
            [
                'cashback' => 'exists:cashbacks,id',
                'perc_cashback' => 'required'
            ];

        $feedback =
            [
                'cashback' => 'o E-commerce informado não existe',
                'perc_cashback' => 'O campo :attribute deve possuir um valor válido'
            ];

        $request->validate($regras, $feedback);
        
        //dd($store);
            
        $cashback = Cashback::find($request->get('cashback'));
        $store->cashbacks()->attach($cashback, ['perc_cashback' => $request->get('perc_cashback')]);

        return redirect()->route('admin.cashback.index', ['store' => $store->id])->with('success', 'Adicionado com sucesso');
    }
}
