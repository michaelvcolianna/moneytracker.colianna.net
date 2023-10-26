<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Months implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $monthsAreGood = true;

        for($i = 1; $i < 13; $i++)
        {
            if(!is_bool($value[$i]))
            {
                $monthsAreGood = false;
            }
        }

        if(!$monthsAreGood)
        {
            $fail('The :attribute must be boolean.');
        }
    }
}
