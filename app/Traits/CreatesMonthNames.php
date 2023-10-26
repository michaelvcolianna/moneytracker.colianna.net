<?php

namespace App\Traits;

use DateTime;

trait CreatesMonthNames
{
    /**
     * Take a month number and make the name.
     */
    public function month(int $number): string
    {
        return DateTime::createFromFormat('!m', $number)->format('F');
    }
}
