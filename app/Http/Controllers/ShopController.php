<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.record.shop.index');
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
                    'name' => 'required',
                ];

            $feedback =
                [
                    'name' => 'O campo deve ser preechido',
                ];

            $request->validate($regras, $feedback);

            $store = new Cashback();
            $store->name = $request->input('name');
            $store->logo = $request->file('logo')->store('logo', 'public');
            $store->save();
            return redirect()->route('admin.shop.show')->with('success', 'Cadastro realizado com sucesso');
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
    public function show(Request $request)
    {
        $stores = Cashback::where('name', 'like', '%' . $request->input('name') . '%')->get();

        return view('admin.record.shop.show', ['stores' => $stores]);
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

        return view('admin.record.shop.edit', ['store' => $store]);
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
    public function destroy(Cashback $store)
    {
        $store->delete();

        return redirect()->route('admin.shop.show');
    }
}
