<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
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
            return redirect()->route('admin.edit', [$request->input('id')]);
        }
        return redirect()->route('admin.index')->with('success', 'Cadastro feito com sucesso');
    }

    public function list(Request $request)
    {
        $stores = Store::where('name', 'like', '%' . $request->input('name') . '%')->paginate(10);
        return view('admin.list', ['stores' => $stores]);
    }

    public function cashback()
    {
        return view('admin.cashback');
    }

    public function cashback_to_add(Request $request)
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
            return redirect()->route('admin.cashback')->with('success', 'Cadastro realizado com sucesso');
            if ($request->input('_token') != '' && $request->input('id') != '') {
                $store = Cashback::find($request->input('id'));
                $update = $store->update($request->all());

                if ($update) {
                    Session::flash('success', 'Edição realizada com sucesso');
                } else {
                    Session::flash('success', 'Edição com dados inválidos');
                }
                return redirect()->route('admin.Cashback_edit', [$request->input('id')]);
            }
            return view('admin.list_cashback');
        }
    }

    public function edit($id)
    {
        $store = Store::find($id);

        return view('admin.edit', ['store' => $store]);
    }

    public function Cashback_edit($id)
    {
        $store = Cashback::find($id);

        return view('admin.Cashback_edit', ['store' => $store]);
    }

    public function list_Cashback(Request $request)
    {
        $stores = Cashback::where('cashback', 'like', '%' . $request->input('cashback') . '%')->get();

        return view('admin.list_cashback', ['stores' => $stores]);
    }
}
