<?php

namespace App\Services\NumbersToWords\Contracts;

interface ConvertsNumbersToWords
{
    public static function convert(int $number): string;
}
