<?php

namespace App\Http\Controllers\Admin;

use App\Exemplar;
use App\Livro;
use App\User;
use App\Troca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrocaController extends Controller
{
    public function index()
    {
        

        $trocas = Troca::whereNotNull('cd_exemplar_a')->
                         where(function ($query) {
                            $query->
                            where('cd_usuario_a', Auth::user()->id)->
                            orWhere('cd_usuario_b', Auth::user()->id);
                          })
                          ->get();


                       
       
       
        return view('admin.trocas.index', compact('trocas'));
          
    
    }  
    
    
    public function notificacao()
    {
    
        $trocas = Troca::where('cd_usuario_b', Auth::user()->id)->
                         where('ds_status_troca', 'like', 'solicitado')->get();

                         
        return view('admin.trocas.notificacao', compact('trocas'));
    
    } 
    
    public function estante($id,$trocaId)
    {
        $troca = $trocaId;

        
        $exemplares = Exemplar::where('user_id','=',$id)->get();

        
        return view('admin.trocas.estante', compact('exemplares', 'troca'));
    
    }
    
    public function resumo2($id, $trocaId)

    {
        $troca = $trocaId;

        $exemplar = Exemplar::findOrfail($id);
        $exemplares = Exemplar::All();
        return view('admin.trocas.resumo2', compact('exemplar', 'troca'));
    }


    public function solicita(Request $request)
    {
        $trocaData = $request->all();

        $exemplar = $trocaData['cd_exemplar_b'];

        $troca = new Troca();

        $troca -> create($trocaData);

        flash('Troca Solicitada com sucesso')->success();
        return redirect()->route('exemplar.resumo', [$exemplar]);
    } 

    
    
    
    
    public function troca(Request $request)
    {
        $trocaData = $request->all();

        
        $id =$trocaData['id']; 

        $troca = Troca::findOrfail($id);
        $troca -> update($trocaData);

       
        
        $estanteA = Exemplar::findOrfail($troca['cd_exemplar_a']);
        $estanteB = Exemplar::findOrfail($troca['cd_exemplar_b']);
 
        $userA = $estanteA['user_id'];
        $userB = $estanteB['user_id'];
 
        $estanteA->update([
        'user_id' => $userB,
        'disponibilizar_exemplar' => "nao"
        ]);
        
        $estanteB->update([
        'user_id' => $userA,
        'disponibilizar_exemplar' => "nao"
        ]);


        

        //$exemplarA = $troca['cd_exemplar_a'];
        
        //$exemplarB = $troca['cd_exemplar_b'];
        
        
        //$estanteA = Exemplar::findOrfail($exemplarA);

        //$Adata = $estanteA['user_id'] = $exemplarB ;

        //$estanteA ->update($Adata);

        
        
        
        
        
        //$estanteB = Exemplar::findOrfail($exemplarB);
        //$Bdata = $estanteB['user_id'] = $exemplarA;
        //$estanteB ->update($Bdata);




        flash('Troca realizada com sucesso')->success();
        return redirect()->route('troca.notificacao');


    }



}
