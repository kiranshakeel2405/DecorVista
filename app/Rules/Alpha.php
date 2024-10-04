<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Alpha implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value is a string and contains only alphabetic characters
        if (!is_string($value) || !preg_match('/^[a-zA-Z\s]+$/', $value)) {
            return false; // Validation failed
        }
        
        return true; // Validation passed
    }

    public function message()
    {
        return 'The :attribute must be alphabetic and cannot contain numbers.';
    }
}

