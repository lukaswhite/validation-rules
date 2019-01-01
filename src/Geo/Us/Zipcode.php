<?php

namespace Lukaswhite\Rules\Geo\Us;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Zipcode
 *
 * Validates a US zipcode
 *
 * @package Lukaswhite\Rules\Geo\Us
 */
class Zipcode implements Rule
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
        return is_string( $value ) && preg_match( '/^[0-9]{5}(?:-[0-9]{4})?$/', $value );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid US zipcode.';
    }
}