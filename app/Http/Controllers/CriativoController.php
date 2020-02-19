<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criativo;

class CriativoController extends Controller
{
    public function index()
    {
        return Criativo::all();
    }

    public function show(Criativo $criativo)
    {
        return $criativo;
    }

    public function store(Request $request)
    {
        $criativo = Criativo::create($request->all());

        return response()->json($criativo, 201);
    }

    public function update(Request $request, Criativo $criativo)
    {
        $criativo->update($request->all());

        return response()->json($criativo, 200);
    }

    public function delete(Criativo $criativo)
    {
        $criativo->delete();

        return response()->json(null, 204);
    }
}
