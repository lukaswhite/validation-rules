<?php


namespace Lukaswhite\Rules\Date;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Time
 *
 * Validates a time in the format HH:MM
 *
 * @package Lukaswhite\Rules\Date
 */
class Time implements Rule
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
        if ( ! is_string( $value ) || strlen( $value ) !== 5 ) {
            return false;
        }

        if ( ! preg_match( '/\d\d:\d\d/', $value ) ) {
            return false;
        }

        $parts = explode( ':', $value );

        return $parts[ 0 ] >= 0
            && $parts[ 0 ] <= 23
            && $parts[ 1 ] >= 0
            && $parts[ 1 ] <= 59;
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