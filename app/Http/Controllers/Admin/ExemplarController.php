<?php

namespace App\Http\Controllers\Admin;

use App\Exemplar;
use App\Livro;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExemplarController extends Controller
{
    public function index()
    {
        $exemplares = Exemplar::where('user_id', Auth::user()->id)->get();
        return view('admin.exemplares.index', compact('exemplares'));
    }          

    public function new($id)
    {   
        $livros = Livro::findOrfail($id);
        return view ('admin.exemplares.store', compact('livros'));
    }

    public function store(Request $request)
    {
        $exemplarData = $request->all();
        $livro = Livro::find($exemplarData['livro_id']);
        $livro->exemplares()->create($exemplarData);
        flash('Livro cadastrado com sucesso!')->success();
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
        flash('Livro atualizado com sucesso!')->success();
        return redirect()->route('exemplar.index', ['exemplar =>$id']);
    }

    public function delete($id)
    {
        $exemplar = Exemplar::findOrfail($id);
        $exemplar -> delete();
        flash('Livro excluído com sucesso!')->success();
        return redirect()->route('exemplar.index');
    }

    public function resumo($id)
    {
        $exemplar = Exemplar::findOrfail($id);
        $exemplares = Exemplar::All();
        return view('admin.exemplares.resumo', compact('exemplar'));
    }          

    public function pesquisaPorTitulo($livro)
    {
        $exemplares = Exemplar::all()->where('livro_id', $livro)
        ->where('user_id','<>',Auth::user()->id)
        ->where('disponibilizar_exemplar','LIKE','sim');

       if($exemplares =='[]'){
            flash('Não existe trocador para este livro ainda!')->error();   
            return view('admin.exemplares.pesquisaPorTitulo', compact('exemplares'));
        }
        else
        {
            return view('admin.exemplares.pesquisaPorTitulo', compact('exemplares'));
        }
    }
}
