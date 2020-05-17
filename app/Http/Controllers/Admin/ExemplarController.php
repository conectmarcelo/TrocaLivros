<?php

namespace App\Http\Controllers\Admin;


use App\Exemplar;
use App\Livro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExemplarController extends Controller
{
    public function index()
    {
        
        $exemplares = Exemplar::all();

        $exemplares = exemplar::paginate(6); 

        return view('admin.exemplares.index', compact('exemplares'));
    
    }          

    public function new()
    {
        $livros = Livro::all();
       
       
        return view ('admin.exemplares.store', compact('livros'));

        
    }

    public function store(Request $request)
    {
        $exemplarData = $request->all();

        
        $livro = Livro::find($exemplarData['livro_id']);
        $livro->exemplares()->create($exemplarData);

        flash('menu criado com sucesso')->success();
        return redirect()->route('exemplar.index');

    }

    public function edit(exemplar $exemplar)

    {
        $livros = Livro::all();

        
        return view('admin.exemplares.edit', compact('exemplar', 'livros'));
    }

    public function update(Request $request, $id)
    {
        $exemplarData = $request->all();

        $exemplar = Exemplar::findOrfail($id);

        $exemplar -> update($exemplarData);

        flash('Exemplar Atualizado com sucesso')->success();
        return redirect()->route('exemplar.index', ['exemplar =>$id']);


    }

    public function delete($id)
    {
       
        $exemplar = Exemplar::findOrfail($id);

        $exemplar -> delete();

        flash('exemplar Excluindo com Sucesso')->success();
        return redirect()->route('exemplar.index');
    }

}
