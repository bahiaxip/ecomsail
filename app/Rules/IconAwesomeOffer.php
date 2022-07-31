<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IconAwesomeOffer implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $data = substr($value,0,9);
        $data2 = substr($value,-4);
        if($data == '<i class='){
            return $value;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo icono de ofertas debe ser una cadena de Font Awesome válido';
    }
}
