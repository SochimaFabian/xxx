<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LinkValidationRule implements Rule
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
        // Use Laravel's URL validator to check if the value is a valid URL
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid URL.';
    }
}
