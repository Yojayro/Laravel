<?php

namespace App\Http\Controllers;

use App\themes;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true,
            'data' => $this->listar_data(),
            'message' => 'Operacion Correcta'], 200);
    }

    public function create(Request $request)
    {
        $tema = new \stdClass();

        $tema->titulo = $request->input('titulo');
        $tema->descripcion = $request->input('descripcion');
        $tema->fecha = $request->input('fecha');
        $tema->asesor = $request->input('asesor');
        themes::create($request->all());
        return response()->json(
            ['success' => true,
                'data' => $this->listar_data(),
                'message' => 'Operacion Correcta'],
            201);
    }

    public function update(Request $request, $id)
    {
        themes::find($id)->update($request->all());
        return response()->json(
            ['success' => true,
                'data' => $this->listar_data(),
                'message' => 'Operacion Correcta'],
            201);
    }

    public function destroy($id)
    {
        themes::find($id)->delete();
        return response()->json(
            ['success' => true,
                'data' => $this->listar_data(),
                'message' => 'Operacion Correcta'],
            201);
    }

    public function listar_data()
    {

        return themes::all();
    }
}
