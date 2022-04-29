<?php

namespace App\Http\Controllers;

use App\Store;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use Spatie\Permission\Models\Permission;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.managerUser.permission.index', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->Admin = (bool)$request->Admin;
        $user->save();
        
        return redirect()->route('manager.index', ['user' => $user])->with('sucess', 'Atualizado');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.managerUser.permission.edit', ['user' => $user]);
    }
}



//<form action="{{ route('manager.store', ['users' => $users]) }}" method="POST" enctype="multipart/form-data">
//@csrf