<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BenSampo\Enum\Enum;

class EnumController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  string $nome_enum nome da classe do Enum
     * @return \Illuminate\Http\Response
     */
    public function show(string $nome_enum)
    {
        $enum_classe = 'App\Enums\\';
        $nome_separado = explode('-', $nome_enum);

        foreach ($nome_separado as $value) {
            $enum_classe .= ucfirst($value);
        }

        return response()->json($enum_classe::getInstances());
    }
}
