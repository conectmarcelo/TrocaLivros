<?php

namespace App\Http\Controllers\Admin;

use App\LivroFoto;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;
use Illuminate\Support\Facades\Auth;


class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();

        $livros = Livro::paginate(6); 

        return view('admin.livros.index', compact('livros'));
    }

    public function new()
    {
        return view('admin.livros.store');
    }

    public function store(Request $request)
    {
        $livroData = $request->all();

        $livro = new Livro();

        $livro -> create($livroData);

        flash('Livro criado com sucesso')->success();
        return redirect()->route('livro.index');

    }

    public function edit(Livro $livro)
    {
        return view('admin.livros.edit', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $livroData = $request->all();

        $livro = Livro::findOrfail($id);

        $livro -> update($livroData);

        flash('Livro Atualizado com sucesso')->success();
        return redirect()->route('livro.index', ['livro =>$id']);


    }

    public function delete($id)
    {
       
        $livro = Livro::findOrfail($id);

        $livro -> delete();

        flash('Livro Excluindo com Sucesso')->success();
        return redirect()->route('livro.index');
    }

}
