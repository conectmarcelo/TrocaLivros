<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $users = User::paginate(6); 

        return view('admin.users.index', compact('users'));
    }

    public function new()
    {
        return view('admin.users.store');
    }

    public function store(Request $request)
    {
        $userData = $request->all();

        $user = new User();

        $user -> create($userData);

        flash('Usuario criado com sucesso')->success();
        return redirect()->route('user.index');

    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $userData = $request->all();

        $user = User::findOrfail($id);

        $user -> update($userData);

        flash('user Atualizado com sucesso')->success();
        return redirect()->route('user.index', ['user =>$id']);

    }

    public function delete($id)
    {
       
        $user = User::findOrfail($id);

        $user -> delete();

        flash('Usuario Removido com Sucesso')->success();
        return redirect()->route('user.index');
    }


    public function editPerfil()
    {
        
        $user = User::where('id', Auth::user()->id)->get();

            
        return view('admin.users.perfil', compact('user'));
    }

    public function updatePerfil(Request $request, $id)
    {

        $userData = $request->all();
        $user = User::findOrfail($id);
        

        $foto = $request->file('ds_foto');
        $newName = sha1($foto->getClientOriginalName()) . uniqid() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $newName);
        
        

        $userData['ds_foto'] = $newName;             
      

        
       $user -> update($userData);
      
        flash('Perfil Atualizado com sucesso')->success();
        return redirect()->route('user.edit.perfil');

       

    }

    




}
