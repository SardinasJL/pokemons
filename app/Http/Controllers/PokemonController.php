<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{

    public function validarForm(Request $request)
    {
        $request->validate([
            "nombre" => "required|string|min:3|max:50",
            "altura" => "required|numeric|min:0",
            "peso" => "required|numeric|min:0",
            "tipos_id" => "required|numeric|min:1"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        //$pokemons = Pokemon::all();
        //dd(Pokemon::select("pokemons.nombre")->rightJoin("tipos", "pokemons.tipos_id", "=", "tipos.id")->get());
        //dd(Pokemon::select(DB::raw("count('pokemons.tipos_id')"))->join("tipos", "pokemons.tipos_id", "=", "tipos.id")->groupBy("pokemons.tipos_id")->get());
        return view("pokemon_index", ["tipos" => $tipos, "pokemons" => $pokemons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view("pokemon_create", ["tipos" => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Pokemon::create($request->all());
        return redirect()->route("pokemons.index")->with(["mensaje" => "Pokemon creado correctamente"]);
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
        $pokemon = Pokemon::find($id);
        $tipos = Tipo::all();
        return view("pokemon_edit", ["pokemon" => $pokemon, "tipos" => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $pokemon = Pokemon::find($id);
        $pokemon->update($request->all());
        return redirect()->route("pokemons.index")->with(["mensaje" => "Pokemon editado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pokemon = Pokemon::find($id);
        $pokemon->delete();
        return redirect()->route("pokemons.index")->with(["mensaje" => "Pokemon borrado"]);
    }
}
