<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($id)
    {
        $store = Store::find($id);

        return view('app.page.page', ['store' => $store]);
    }

    public function redirect($id)
    {
        $store = Store::find($id);

        return view('app.page.redirect', ['store' => $store]);
    }
}
