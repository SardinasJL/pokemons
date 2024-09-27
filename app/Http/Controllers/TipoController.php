<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TipoController extends Controller
{

    public function validarForm(Request $request)
    {
        $request->validate([
            "descripcion" => "required|string|min:3|max:50"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view("tipo_index", ["tipos" => $tipos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipo_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Tipo::create($request->all());
        return redirect()->route("tipos.index")->with(["mensaje" => "Tipo creado exitosamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo = Tipo::find($id);
        return view("tipo_edit", ["tipo" => $tipo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $tipo = Tipo::find($id);
        $tipo->update($request->all());
        return redirect()->route("tipos.index")->with(["mensaje" => "Tipo editado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = Tipo::find($id);
        $tipo->delete();
        return redirect()->route("tipos.index")->with(["mensaje" => "Tipo eliminado"]);
    }

    public function reporte($id)
    {
        $tipo = Tipo::find($id);
        $pdf = App::make("dompdf.wrapper");
        $pdf->loadView("tipos_reporte", ["tipo"=>$tipo]);
        $pdf->setPaper("letter", "portrait")->setWarnings(false);
        return $pdf->stream();
        //return view("tipos_reporte", ["tipo" => $tipo]);
    }
}
