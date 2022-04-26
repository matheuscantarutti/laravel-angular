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
        $merge = array();

        foreach ($this->request as $key => $value) {

            if(!empty($value)) {
                strip_tags($this->$key);
                $merge[$key] = $value;
            }

        }

        $this->merge([
            ...$merge
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
            'telefone' => ['regex:/[0-9()"-]+/', 'max:255'],
            'email' => ['email', 'max:255'],
            'status_indicacao' => 'exclude'
        ];

        if($this->request->get('cpf') !== $this->indicado->cpf){
            $rules['cpf'] = ['unique:indicados', 'not_regex:/[^0-9]/', 'max:11', 'cpf'];
        }

        if($this->routeIs('evolucao')){

            $rules = [
                'status_indicacao' => [
                    'regex:/[1-3]/',
                    new EvolucaoStatusIndicacao($this->indicado)
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

}
