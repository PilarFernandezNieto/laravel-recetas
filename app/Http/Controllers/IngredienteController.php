<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredienteRequest;
use App\Http\Resources\IngredienteCollection;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IngredienteCollection(Ingrediente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IngredienteRequest $request)
    {

        $datos = $request->validated();

        $imagen = $request->imagen->store('img', "public");
        $datos['imagen'] = asset('storage/' . $imagen);

        $ingrediente = Ingrediente::create([
            'nombre' => $datos['nombre'],
            'imagen' => $datos['imagen'],
            'descripcion' => $datos['descripcion'],
        ]);

        return [
           "type" => "success",
           "ingrediente" => $ingrediente,
           "message" => "Ingrediente creado correctamente"
        ];
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
