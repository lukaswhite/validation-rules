<?php

namespace Lukaswhite\Rules\Geo\Uk;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Postcode
 *
 * Validates a United Kingdom postcode
 *
 * @package Lukaswhite\Rules\Geo
 */
class Postcode implements Rule
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
        return \Lukaswhite\UkPostcode\UkPostcode::validate( $value );
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