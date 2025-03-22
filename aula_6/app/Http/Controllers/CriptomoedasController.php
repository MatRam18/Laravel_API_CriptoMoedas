<?php

namespace App\Http\Controllers;

use App\Models\Criptomoedas;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CriptomoedasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $regBook = Criptomoedas::All();
        $contador = $regBook->count();

        return Response()->json($regBook);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        };
        
        $registro = Criptomoedas::create($request->all());

        if ($registro) {
            return response()->json([
                'success' => true,
                'message' => 'Criptomoeda cadastrada com sucesso',
                'date' => $registro
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar a criptomoeda',
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Criptomoedas $id)
    {

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criptomoedas $criptomoedas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criptomoedas $criptomoedas)
    {
        //
    }
}
