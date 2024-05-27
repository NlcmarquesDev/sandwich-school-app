<?php

declare(strict_types=1);

namespace App\Core;

class ValidateForm
{

    public static function string($value, $min = 3, $max = INF)
    {
        $valueWithOutSpaces = trim($value);

        return strlen($valueWithOutSpaces) >= $min && strlen($valueWithOutSpaces) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
