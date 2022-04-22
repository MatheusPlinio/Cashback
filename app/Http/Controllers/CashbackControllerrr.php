<?php

namespace App\Http\Controllers;

use App\Cashback;
use App\Loja;
use Illuminate\Http\Request;

class CashbackController extends Controller
{
    public function index($id, Request $request)
    {
        $stores = Loja::all($id);

        return view('admin.cashback_update', ['stores' => $stores, 'request' => $request->all()]);
    }

    public function store()
    {
        $shops = Cashback::all();
        return view('admin.cashback_update', ['shops' => $shops]);
    }

    public function update() 
    {

    }
}

