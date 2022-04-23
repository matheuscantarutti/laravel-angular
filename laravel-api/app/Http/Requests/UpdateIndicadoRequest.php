<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Enums\StatusIndicacao;
use BenSampo\Enum\Rules\EnumValue;

class UpdateIndicadoRequest extends FormRequest
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
            'nome' => ['max:255'],
            'cpf' => ['unique:indicados', 'regex:/\d/', 'max:11'],
            'telefone' => ['regex:/\d/', 'max:255'],
            'email' => ['email', 'max:255'],
            'status_indicacao' => new EnumValue(StatusIndicacao::class)
        ];
    }

    public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json([
         'erros' => $validator->errors()
       ], 400));
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct'
        ];
    }
}
