<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Http\Requests\IngredienteRequest;
use App\Http\Resources\IngredienteCollection;
use App\Traits\ImageHandler;

class IngredienteController extends Controller
{

    use ImageHandler;
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
    public function show(Ingrediente $ingrediente)
    {
        return $ingrediente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IngredienteRequest $request, Ingrediente $ingrediente)
    {
        $datos = $request->validated();
        // Si se envió una nueva imagen, reemplazar la imagen existente

        if ($request->hasFile('imagen')) {
            $this->borraImagen($ingrediente->imagen);
            $imagen = $request->imagen->store('img', 'public');
            $datos['imagen'] = asset('storage/' . $imagen);
        } else {
            $datos['imagen'] = $ingrediente->imagen;
        }
        $ingrediente->update([
            'nombre' => $datos['nombre'],
            'imagen' => $datos['imagen'],
            'descripcion' => $datos['descripcion']
        ]);
        return [
            "type" => "success",
            "message" => "Ingrediente actualizado correctamente"
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingrediente)
    {

        $this->borraImagen($ingrediente->imagen);

        $ingrediente->delete();
        return [
            "type" => "success",
            "message" => "Ingrediente eliminado correctamente"
        ];
    }


}
