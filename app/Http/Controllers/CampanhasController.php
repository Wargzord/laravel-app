<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campanha;
use Auth;

class CampanhasController extends Controller
{
    public function index()
    {
        return Campanha::all();
    }

    public function show(Campanha $campanha)
    {
        return $campanha;
    }

    public function store(Request $request)
    {
        $campanha = Campanha::create($request->all());

        return response()->json($campanha, 201);
    }

    public function update(Request $request, Campanha $campanha)
    {
        $campanha->update($request->all());

        return response()->json($campanha, 200);
    }

    public function delete(Campanha $campanha)
    {
        $campanha->delete();

        return response()->json(null, 204);
    }
}
