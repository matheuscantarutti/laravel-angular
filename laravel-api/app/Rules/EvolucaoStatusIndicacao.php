<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EvolucaoStatusIndicacao implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($indicado)
    {
        $this->indicado = $indicado;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->indicado->status_indicacao === 3){
            return false;
        }

        return $this->indicado->status_indicacao + 1 === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Evolução incorreta da indicação. Verifique o status_indicacao.';
    }
}
