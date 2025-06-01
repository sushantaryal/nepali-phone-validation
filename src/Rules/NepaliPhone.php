<?php

namespace Sushant\NepaliPhoneValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

class NepaliPhone implements Rule
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
        // Remove all non-digit characters
        $number = preg_replace('/[^\d]/', '', $value);

        // Remove leading +977, 977, or 0
        $number = preg_replace('/^(?:\+?977|0)/', '', $number);

        // must start with one of the prefixes and followed by 7 digits
        return preg_match('/^(984|985|986|980|981|982|961|988|972)\d{7}$/', $number);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid Nepali mobile number.';
    }
}
