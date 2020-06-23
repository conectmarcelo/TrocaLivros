<?php

namespace App\Http\Controllers;

use App\Exemplar;
use App\Livro;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SinglePageController extends Controller
{


    public function index()
    {
        
      if (Auth::check()){ 
        
        $exemplares = Exemplar::where('disponibilizar_exemplar','LIKE','sim')->where('user_id','<>',Auth::user()->id)->simplePaginate(12);
      }
      else{
    


      $exemplares = Exemplar::where('disponibilizar_exemplar','LIKE','sim')->get();

      $exemplares = Exemplar::paginate(12);
      }   

        
        return view('admin.exemplares.home', compact('exemplares'));

    }
    
    
    /*public function pesquisar(Request $request)
    {
     
      $text = $request->text;

      $livros = Livro::where('nm_titulo_livro', 'LIKE', "%{$text}%")->simplePaginate(12);
      
      
     
      return view('admin.livros.home', compact('livros'));
      
    }
    */
    


}

