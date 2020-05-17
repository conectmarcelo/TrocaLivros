<?php

namespace App\Http\Controllers\Admin;


use App\LivroFoto;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;



class LivroFotoController extends Controller
{
    public function index($livro)
    {
        $livro_id = $livro;
        return view ('admin.livros.fotos.index', compact('livro_id'));
        
    }

    
    public function save(Request $request, $livro)
    {
        foreach($request->file('fotos') as $foto)
        {
            //print $foto->getClientOriginalName().'<br>';
        
            $newName = sha1($foto->getClientOriginalName()) . uniqid() . '.' . $foto->getClientOriginalExtension();
            
            $foto->move(public_path('images'), $newName);

            print $newName;
           
            $livro = Livro::find($livro);
            $livro->fotos()->create([
                'foto' => $newName
            ]);

        }

        flash('Foto adicionada com sucesso')->success();
        return redirect()->route('livro.index');

    }   
    
}