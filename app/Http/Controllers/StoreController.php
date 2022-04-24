<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.record.store.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras =
                [
                    'name' => 'required|min:3|max:20',
                    'link' => 'required|min:8|',
                    'image' => 'required',
                ];

            $feedback =
                [
                    'required' => 'O campo :attribute deve ser preenchido',
                    'name.min' => 'O campo nome deve possuir no mínimo 3 caracteres',
                    'name.max' => 'O campo nome deve possuir no máximo 20 caracteres',
                    'link.min' => 'O campo deve preencher no mínimo 8 caracteres',
                    'image' => 'Deve ser inserido um arquivo de imagem',
                ];

            $request->validate($regras, $feedback);

            $loja = new Store();
            $loja->name = $request->input('name');
            $loja->link = $request->input('link');
            $loja->image = $request->file('image')->store('image', 'public');
            $loja->save();
        }
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $store = Store::find($request->input('id'));
            $update = $store->update($request->all());

            if ($update) {
                Session::flash('success', 'Edição realizada com sucesso');
            } else {
                Session::flash('success', 'Edição com dados inválidos');
            }
            return redirect()->route('admin.store.edit', [$request->input('id')]);
        }
        return redirect()->route('store.index')->with('success', 'Cadastro feito com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        {
            $stores = Store::where('name', 'like', '%' . $request->input('name') . '%')->paginate(10);
            return view('admin.record.store.show', ['stores' => $stores]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);

        return view('admin.record.store.edit', ['store' => $store]);
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
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('admin.store.show');
    }
}
