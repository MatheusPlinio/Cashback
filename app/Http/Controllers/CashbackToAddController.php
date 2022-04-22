<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use App\Store;
use Illuminate\Http\Request;

class CashbackToAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store )
    {
        $regras =
            [   'store_id' => 'exists:cashbacks,id',
                'cashback_id' => 'exists:cashbacks,id',
                'perc_cashback' => 'required'
            ];

        $feedback =
            [   
                'store_id' => 'Loja não existente',
                'cashback_id' => 'o E-commerce informado não existe',
                'perc_cashback' => 'O campo :attribute deve possuir um valor válido'
            ];

        $request->validate($regras, $feedback);
        
        $store->cashbacks()->attach(
            [
                $request->get('cashback_id') => ['perc_cashback' => $request->get('perc_cashback')]
            ]
        );

        return redirect()->route('cashback_update.update', ['store' => $store])->with('success', 'Adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $cashback_to_adds)
    {
        return view('admin.cashback_create_edit', ['cashback_to_add' => $cashback_to_adds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
