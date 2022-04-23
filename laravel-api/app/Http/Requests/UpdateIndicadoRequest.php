<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Enums\StatusIndicacao;
use BenSampo\Enum\Rules\EnumValue;
use App\Rules\EvolucaoStatusIndicacao;

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

    protected function prepareForValidation()
    {
        $this->merge([
            'nome' => strip_tags($this->nome),
            'cpf' => strip_tags($this->cpf),
            'telefone' => strip_tags($this->telefone),
            'email' => strip_tags($this->email)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nome' => ['max:255'],
            'cpf' => ['unique:indicados', 'not_regex:/[^0-9]/', 'max:11', 'cpf'],
            'telefone' => ['not_regex:/[^0-9]/', 'max:255'],
            'email' => ['email', 'max:255'],
            'status_indicacao' => 'prohibited'
        ];

        if($this->routeIs('evolucao')){

            $rules = [
                'status_indicacao' => [
                    new EnumValue(StatusIndicacao::class),
                    new EvolucaoStatusIndicacao($this->route('indicado'))
                ]
            ];
        }

        return $rules;
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
