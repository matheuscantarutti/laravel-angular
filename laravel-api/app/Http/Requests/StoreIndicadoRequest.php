<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Enums\StatusIndicacao;
use Illuminate\Validation\Rules\Enum;

class StoreIndicadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:255'],
            'cpf' => ['required', 'unique:indicados', 'not_regex:/[^0-9]/', 'max:11'],
            'telefone' => ['required', 'not_regex:/[^0-9]/'],
            'email' => ['required', 'email'],
            'status_indicacao' => ['integer', 'size:1']
        ];
    }

    public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json([
         'erros' => $validator->errors()
       ], 400));
    }

}
