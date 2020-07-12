<?php

namespace App\Http\Controllers;

use App\Exemplar;
use App\Livro;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SinglePageController extends Controller
{

    public function index()
    {
        
        if (Auth::check()){ 
          
          $exemplares = Exemplar::where('disponibilizar_exemplar','LIKE','sim')->where('user_id','<>',Auth::user()->id)->paginate(6);
        }
        else{
      
        $exemplares = Exemplar::where('disponibilizar_exemplar','LIKE','sim')->paginate(6);
        
        }   
          return view('admin.exemplares.home', compact('exemplares'));

    }

    public function pesquisar(Request $request)
    {

    //$exemplares = db::select("SELECT livros.nm_titulo_livro , livros.nm_autor_livro, exemplares.livro_id, exemplares.id
    //FROM livros INNER JOIN exemplares ON livros.id = exemplares.livro_id WHERE nm_titulo_livro LIKE '%{$text}%'");

        $text = $request->text;

        

        $livros = Livro::where('nm_titulo_livro', 'LIKE', "%{$text}%")
                    ->orWhere('cd_isbn_livro', 'LIKE', "%{$text}%")
                    ->orWhere('nm_autor_livro', 'LIKE', "%{$text}%")
                    ->get();

        if($livros =='[]'){

        
          flash('Livro não encontrado!')->error();  
          return view('admin.livros.home', compact('livros'));
        }
        else{
          
          return view('admin.livros.home', compact('livros'));

        }
      
      
    }


    public function livros()
    {
        
       $livros = DB::SELECT('select * from livros 
       where livros.id in (select livro_id from exemplares where disponibilizar_exemplar like "sim") ');
       

       return view('admin.livros.home', compact('livros'));

    }
    
   

    public function pesquisarSideBar(Request $request)
    {
        $filtro = $request->all();
        
        if($filtro == []){
        
            flash('Selecone o Filtro')->error();
            return redirect()->route('single.livros');
        }
        else{
            $livros = DB::table('livros')
                ->join('exemplares', 'livros.id', '=', 'exemplares.livro_id')
                ->join('users', 'users.id', '=', 'exemplares.user_id')
                ->join('exemplares_fotos','exemplares.id','=','exemplares_fotos.id')
                ->select(
                    'livros.id',
                    'livros.nm_titulo_livro',
                    'livros.nm_autor_livro',
                    'livros.nm_editora_livro',
                    'livros.ds_categoria_livro',
                    'exemplares_fotos.foto',
                    'exemplares.estado_exemplar',
                    'exemplares.user_id',
                    'exemplares.disponibilizar_exemplar',
                    'users.ds_cidade',
                    'users.ds_uf',
                    'users.name'
                    
                )
                ->where('user_id','<>',Auth::user()->id)
                ->where('disponibilizar_exemplar','=','sim');

            if(isset($request['ds_categoria_livro'])){
                $livros = $livros->WhereIn('ds_categoria_livro', $request['ds_categoria_livro']);
            }

            if(isset($request['estado_exemplar'])){
                $livros = $livros->whereIn('estado_exemplar', $request['estado_exemplar']);
            }

            if(isset($request['ds_cidade'])){
                $livros = $livros->whereIn('ds_cidade', $request['ds_cidade']);
            }

            $exemplares = $livros->get(); 
            //return $exemplares;
             return view('admin.exemplares.home', compact('exemplares'));
        }
    }
}

