<?php

namespace App\Http\Controllers;

use App\Loja;
use App\Store;
use Illuminate\Http\Request;

class StoreListController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::where('name', 'like', '%' . $request->input('name') . '%')->paginate(10);
        return view('admin.list', ['stores' => $stores]);
    }
}
