<?php

namespace App\Http\Controllers\Admin;


use App\LivroFoto;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;




class LivroFotoController extends Controller
{
    public function index($livro)
    {
        $livro_id = $livro;

        $fotos = DB::table('livros_fotos')->where('livro_id', '=', $livro_id )->get();

        return view ('admin.livros.fotos.index', compact('livro_id', 'fotos'));
        
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
        return redirect()->route('livro.foto', ['livro'=>$livro]);

    }   

    public function delete($livro_id, $id)
    {
       
        $livro = LivroFoto::findOrfail($id);

       

        unlink(public_path('images').'\\'. $livro->foto);
        $livro -> delete();

        // accf102caaa970ce65d217b9ae9a8e9a57caa67c5ecab55c6bb9d.jpg

       

        flash('Foto Excluida com Sucesso')->success();
        return redirect()->route('livro.foto', ['livro'=>$livro_id]);
    }
    
}