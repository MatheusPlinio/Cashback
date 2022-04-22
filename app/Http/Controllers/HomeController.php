<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use App\Store;
use App\User;
use Illuminate\Auth\RequestGuard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stores = Store::all();
        return view('home.index', ['stores' => $stores]);
    }

    public function contato()
    {
        return view('app.contato');
    }

    public function page($id)
    {
        $store = Store::find($id);

        return view('app.page', ['store' => $store]);
    }

    public function edit(Store $store)
    {
        $cashbacks = Cashback::all();

        return view('admin.cashback_create_edit', ['store' => $store, 'cashbacks' => $cashbacks]);
    }

    public function update()
    {
        $stores = Store::all();

        return view('admin.cashback_update', ['stores' => $stores]);
    }
}
