<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use App\Models\Obra;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\PexelsService;


class ObraController extends Controller
{
    protected $pexelsService;

    public function __construct(PexelsService $pexelsService)
    {
        $this->pexelsService = $pexelsService;
    }


    public function index(){
        $obras = Obra::paginate(10);
        return view("obras.index", compact("obras"));
    }

    public function create($id = null){
        $obra = Obra::find($id);
        $incidentes = Incidente::all();
        $incidentesSeleccionados = $obra ? ($obra->incidentes ? $obra->incidentes->pluck('id')->toArray() : [])  : [];
        return view("obras.form", compact("obra", "incidentes", "incidentesSeleccionados"));
    }

    public function store(Request $request){
        
        $request->validate([
            'numero_obra' => 'required|integer|min:100|max:999|unique:obras,numero,' . ($request->obra_id ?? 'NULL') . ',id',
            'nombre_obra' => 'required|string|max:255',
            'clave_obra' => ['required', 'regex:/^GT2025-[A-Z]{3}\/\d{2}$/', 'unique:obras,clave,' . ($request->obra_id ?? 'NULL') . ',id'],
            'objeto_obra' => 'required|string',
            'direccion' => 'required|string',
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180',
        ]);

        $obraData = [
            'numero' => $request->numero_obra,
            'nombre' => $request->nombre_obra,
            'clave' => $request->clave_obra,
            'objeto' => $request->objeto_obra,
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud
        ];
    
        if ($request->obra_id) {
            $obra = Obra::find($request->obra_id);
            if ($obra) {
                $obra->update($obraData);
                $accion = "actualizado";
        
                $obra->incidentes()->sync([]);
        
                if ($request->has('incidentes')) {
                    $obra->incidentes()->sync($request->incidentes);
                }
            } else {
                return redirect()->route("obras.index")->with("error", "La obra no se encontró.");
            }
        } else {
            $images = $this->pexelsService->getConstructionImages(5);
            $formattedImages = array_map(function ($image) {
                return [
                    'url' => $image['src']['original'],
                    'photographer' => $image['photographer'],
                    'photographer_url' => $image['photographer_url']
                ];
            }, $images);
        
            $obraData['galeria_imagenes'] = json_encode($formattedImages);
        
            $obra = Obra::create($obraData);
            $accion = "registrado";
        
            if ($request->has('incidentes')) {
                $obra->incidentes()->sync($request->incidentes);
            }
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


    public function pdf($id){
        // Verificar autenticación
        if (!Auth::check()) {
            abort(403, "Debe estar autenticado para generar el PDF.");
        }

        // Obtener la obra y verificar que existe
        $obra = Obra::find($id);
        if (!$obra) {
            abort(404, "La obra ya no existe.");
        }

        // Generar la URL dinámica
        $url = route('obras.pdf', ['id' => $id]);

        // Crear y guardar el código QR
        $qrCode = QrCode::create($url)
            ->setSize(200)
            ->setMargin(10);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $qrPath = public_path("qrcode_{$id}.png");
        file_put_contents($qrPath, $result->getString());

        // Generar PDF con la imagen del QR
        $pdf = PDF::loadView('pdf.obra', [
            'qrPath' => asset("qrcode_{$id}.png"),
            'obra' => $obra
        ]);

        return $pdf->download('ficha_obra.pdf');
    }
    

}
