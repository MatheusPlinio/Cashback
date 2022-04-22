<?php

namespace App\Http\Controllers;

use App\Cashback;
use Illuminate\Http\Request;

class CashbackListController extends Controller
{
    public function index(Request $request)
    {
        $stores = Cashback::where('name', 'like', '%' . $request->input('name') . '%')->get();

        return view('admin.list_cashback', ['stores' => $stores]);
    }
}
