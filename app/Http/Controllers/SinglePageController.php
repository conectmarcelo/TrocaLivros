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

        $livros = Livro::where('nm_titulo_livro', 'LIKE', "%{$text}%")->
                        orWhere('cd_isbn_livro', 'LIKE', "%{$text}%")->
                        orWhere('nm_autor_livro', 'LIKE', "%{$text}%")->
                        join('livros_fotos', 'livros.id', 'livros_fotos.livro_id')->get();

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
        
       $livros = DB::SELECT("select  * from livros inner join livros_fotos on livros.id = livros_fotos.livro_id
       where livros.id in (select livro_id from exemplares where disponibilizar_exemplar like 'sim') ");
        
       
        
        
        
        
        return view('admin.livros.home', compact('livros'));

    }
    
    


}

