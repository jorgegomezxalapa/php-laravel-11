<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use Illuminate\Http\Request;

class IncidenteController extends Controller
{
    public function index()
    {
       
        $incidentes = Incidente::paginate(2);
        return view("incidentes.index", compact("incidentes"));
    }

    public function create($id = null)
    {
        $incidente = Incidente::find($id);
        return view("incidentes.form", compact("incidente"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_incidente' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_incidente' => 'required|date',
        ]);

        if($request->incidente_id){
            $incidente = Incidente::find($request->incidente_id);
            $incidente->tipo_incidente = $request->tipo_incidente;
            $incidente->descripcion = $request->descripcion;
            $incidente->fecha_incidente = $request->fecha_incidente;
            $incidente->save();
            $accion = "actualizado";
        }else{
            Incidente::create($request->all());
            $accion = "creado";
        }

        return redirect()->route("incidentes.index")->with("success", "El incidente se ha $accion con éxito");
    }

    public function delete(Request $request){
        $incidente = Incidente::find($request->incidente_id);
        $incidente->delete();
        return redirect()->route("incidentes.index")->with("success", "El incidente se ha eliminado con éxito");

    }
}
