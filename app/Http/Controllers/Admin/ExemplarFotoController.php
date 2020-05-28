<?php

namespace App\Http\Controllers\Admin;


use App\ExemplarFoto;
use App\Exemplar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;



class ExemplarFotoController extends Controller
{
    public function index($exemplar)
    {
        $exemplar_id = $exemplar;

        $fotos = DB::table('exemplares_fotos')->where('exemplar_id', '=', $exemplar_id )->get();       
    
        return view ('admin.exemplares.fotos.index', compact('exemplar_id', 'fotos'));
        
    }

    
    public function save(Request $request, $exemplar)
    {
        foreach($request->file('fotos') as $foto)
        {
            //print $foto->getClientOriginalName().'<br>';
        
            $newName = sha1($foto->getClientOriginalName()) . uniqid() . '.' . $foto->getClientOriginalExtension();
            
            $foto->move(public_path('images'), $newName);

            print $newName;
           
            $exemplar = Exemplar::find($exemplar);
            $exemplar->fotos()->create([
                'foto' => $newName
            ]);

        }

        flash('Foto adicionada com sucesso')->success();
        return redirect()->route('exemplar.foto', ['exemplar'=>$exemplar]);

    }   


    public function delete($exemplar_id, $id)
    {
       
        $exemplar = ExemplarFoto::findOrfail($id);

       

        unlink(public_path('images').'\\'. $exemplar->foto);
        $exemplar -> delete();

        // accf102caaa970ce65d217b9ae9a8e9a57caa67c5ecab55c6bb9d.jpg

       

        flash('Foto Excluida com Sucesso')->success();
        return redirect()->route('exemplar.foto', ['exemplar'=>$exemplar_id]);
    }
    
}