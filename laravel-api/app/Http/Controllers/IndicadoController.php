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
        $indicados = Indicado::paginate(10);
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
        $request->validated();

        $indicado = Indicado::create($request->all());

        $indicado->status_indicacao = 1;

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
        return new IndicadoResource( $indicado );
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
        $request->validated();

        $indicado->update($request->all());

        return new IndicadoResource( $indicado );
    }

    public function evoluir(UpdateIndicadoRequest $request, Indicado $indicado)
    {
        $request->validated();

        $indicado->update($request->all());

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
