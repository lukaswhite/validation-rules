<?php

namespace Lukaswhite\Rules\Geo;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Longitude
 *
 * Validates a (numeric) longitude
 *
 * @package Lukaswhite\Rules\Geo
 */
class Longitude implements Rule
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
        return is_numeric( $value ) && $value >= -180 && $value <= 180;
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