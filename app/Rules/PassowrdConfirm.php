<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PassowrdConfirm implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
      
        if (request()->password != "") {
            $password = request()->password;
           
            if ($password !== $value) {
                $fail('The password confirmation does not match.');
            }
        }
    }
}
