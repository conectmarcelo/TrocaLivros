<?php

namespace App\Http\Controllers;

use App\Exemplar;
use App\Livro;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{


    public function index()
    {
        $exemplares = Exemplar::all();
         

       
        return view('admin.exemplares.home', compact('exemplares'));

    }
    
    /*
    public function pesquisar(Request $request)
    {
     
      $text = $request->text;

      $livros = Livro::where('nm_titulo_livro', 'LIKE', "%{$text}%")->paginate(12);
      
      
     
      return view('admin.livros.home', compact('livros'));
      
    }

    */


}

