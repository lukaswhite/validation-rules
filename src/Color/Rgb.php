<?php

namespace Lukaswhite\Rules\Color;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Rgb
 *
 * Validates an RGB color
 *
 * @package Lukaswhite\Rules\Color
 */
class Rgb implements Rule
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
        if ( ! is_array( $value ) )
        {
            return false;
        }

        if ( count( $value ) !== 3 ) {
            return false;
        }

        if (
            array_key_exists( 'red', $value ) &&
            array_key_exists( 'green', $value ) &&
            array_key_exists( 'blue', $value )
        ) {
            return (
                ( is_int( $value[ 'red' ] ) && $value[ 'red' ] >= 0 && $value[ 'red' ] <= 255 ) &&
                ( is_int( $value[ 'green' ] ) && $value[ 'green' ] >= 0 && $value[ 'green' ] <= 255 ) &&
                ( is_int( $value[ 'blue' ] ) && $value[ 'blue' ] >= 0 && $value[ 'blue' ] <= 255 )
            );
        } elseif (
            array_key_exists( 'r', $value ) &&
            array_key_exists( 'g', $value ) &&
            array_key_exists( 'b', $value )
        ) {
            return (
                ( is_int( $value[ 'r' ] ) && $value[ 'r' ] >= 0 && $value[ 'r' ] <= 255 ) &&
                ( is_int( $value[ 'g' ] ) && $value[ 'g' ] >= 0 && $value[ 'g' ] <= 255 ) &&
                ( is_int( $value[ 'b' ] ) && $value[ 'b' ] >= 0 && $value[ 'b' ] <= 255 )
            );
        }

        return false;

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