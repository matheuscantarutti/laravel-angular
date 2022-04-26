<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndicadoRequest;
use App\Http\Requests\UpdateIndicadoRequest;
use App\Models\Indicado;
use App\Http\Resources\Indicado as IndicadoResource;

class IndicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicados = Indicado::orderByRaw('created_at DESC, updated_at DESC')->paginate(10);
        return IndicadoResource::collection($indicados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndicadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndicadoRequest $request)
    {
        $indicado = Indicado::create($request->validated());

        return response()->json(new IndicadoResource( $indicado ), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indicado  $indicado
     * @return \Illuminate\Http\Response
     */
    public function show(Indicado $indicado)
    {
        return response()->json(new IndicadoResource( $indicado ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndicadoRequest  $request
     * @param  \App\Models\Indicado  $indicado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndicadoRequest $request, Indicado $indicado)
    {
        $indicado->update($request->validated());

        return new IndicadoResource( $indicado );
    }

    public function evoluir(UpdateIndicadoRequest $request, Indicado $indicado)
    {
        $indicado->update($request->validated());

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indicado  $indicado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicado $indicado)
    {
        $indicado->delete();

        return response()->json(null, 204);
    }
}
