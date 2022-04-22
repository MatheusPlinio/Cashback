<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CashbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cashback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('_token') != '' && $request->input('id') == ''); {
            $regras =
                [
                    'cashback' => 'required',
                ];

            $feedback =
                [
                    'cashback' => 'O campo deve ser preechido',
                ];

            $request->validate($regras, $feedback);

            $store = new Cashback();
            $store->cashback = $request->input('cashback');
            $store->logo = $request->file('logo')->store('logo', 'public');
            $store->save();
            return redirect()->route('cashback.index')->with('success', 'Cadastro realizado com sucesso');
            if ($request->input('_token') != '' && $request->input('id') != '') {
                $store = Cashback::find($request->input('id'));
                $update = $store->update($request->all());

                if ($update) {
                    Session::flash('success', 'Edição realizada com sucesso');
                } else {
                    Session::flash('success', 'Edição com dados inválidos');
                }
                return redirect()->route('cashback.edit', [$request->input('id')]);
            }
            return view('cashback.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Cashback::find($id);

        return view('admin.Cashback_edit', ['store' => $store]);
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
        //
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
