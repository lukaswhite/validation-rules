<?php

namespace Lukaswhite\Rules\Color;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Hex
 *
 * Validates a color in hexadecimal format
 *
 * @package Lukaswhite\Rules\Color
 */
class Hex implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return is_string( $value ) && ( bool ) preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid UK postcode.';
    }
}