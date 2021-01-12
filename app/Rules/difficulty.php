<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class difficulty implements Rule
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
        //一桁の整数で1か2か3か4か5
        return preg_match('/\A[12345]\z/',$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute には、1から5の数字のみ入れてください';
    }
}
