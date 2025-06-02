<?php

namespace Sushant\NepaliPhoneValidation\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NepaliPhone implements ValidationRule
{
    /**
     * Determine if the validation rule passes.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Remove all non-digit characters
        $number = preg_replace('/[^\d]/', '', $value);

        // Remove leading +977, 977, or 0
        $number = preg_replace('/^(?:\+?977|0)/', '', $number);

        // must start with one of the prefixes and followed by 7 digits
        $isValid = preg_match('/^(?:984|985|986|980|981|982|961|988|972)\d{7}$/', $number);

        if ($isValid !== 1) {
            $fail('The :attribute must be a valid Nepali mobile number.');
        }
    }
}
