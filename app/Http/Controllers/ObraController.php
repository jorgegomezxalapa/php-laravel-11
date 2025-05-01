<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index(){
        $obras = Obra::get();
        return view("obras.index", compact("obras"));
    }

    public function create($id = null){
        $obra = Obra::find($id);
        return view("obras.form", compact("obra"));
    }

    public function store(Request $request){
            $obraData = [
                'numero' => $request->numero_obra,
                'nombre' => $request->nombre_obra,
                'clave' => $request->clave_obra,
                'objeto' => $request->objeto_obra,
                'direccion' => $request->direccion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'galeria_imagenes' => json_encode([]),
            ];
            if($request->obra_id){
                $obra = Obra::find($request->obra_id);
                $obra->update($obraData);
                $accion = "actualizado";
            }else{
                Obra::create($obraData);
                $accion = "registrado";
            }
        
        return redirect()->route("obras.index")->with("success", "La obra se ha $accion con éxito");
    }

    public function show($id)
    {
        $obra = Obra::findOrFail($id);
        return view('obras.show', compact('obra'));
    }

    public function delete(Request $request){
        $obra = Obra::find($request->obra_id);
        $obra->delete();
        return redirect()->route("obras.index")->with("success", "La obra se ha eliminado con éxito");
    }
}
