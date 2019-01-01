<?php

namespace Lukaswhite\Rules\Web;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Slug
 *
 * Validates a slug
 *
 * @package Lukaswhite\Rules\Web
 */
class Slug implements Rule
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
        return is_string( $value ) && ( bool ) preg_match( '/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid slug.';
    }
}