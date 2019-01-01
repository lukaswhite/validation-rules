<?php

namespace Lukaswhite\Rules\Geo;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Latitude
 *
 * Validates a (numeric) latitude
 *
 * @package Lukaswhite\Rules\Geo
 */
class Latitude implements Rule
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
        return is_numeric( $value ) && ( $value >= -90 && $value <= 90 );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid latitude.';
    }
}