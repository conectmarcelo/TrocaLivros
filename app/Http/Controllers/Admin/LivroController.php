<?php

namespace App\Http\Controllers\Admin;

use App\LivroFoto;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        $foto = $request->file('ds_foto');

        
        $newName = sha1($foto->getClientOriginalName()) . uniqid() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $newName);
        $livroData['ds_foto'] = $newName; 

        
        $regras = ['cd_isbn_livro' => 'required|unique:livros'];
                
        $message = ['unique' => 'Já exite cadastro'];


        $request->validate($regras,$message);

        $livro = new Livro();

        $livro -> create($livroData);

        flash('Livro cadastrado com sucesso, ')->success();
        return redirect()->route('pesquisar.livro');

    
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


    public function pesquisar(Request $request)
    {
     
      $text = $request->text;

      $livros = Livro::where('nm_titulo_livro', 'LIKE', "%{$text}%")->
                       orWhere('cd_isbn_livro', 'LIKE', "%{$text}%")->
                       orWhere('nm_autor_livro', 'LIKE', "%{$text}%")->get();
      
      
     
      return view('admin.livros.pesquisa', compact('livros'));
      
    }
    
    



}
