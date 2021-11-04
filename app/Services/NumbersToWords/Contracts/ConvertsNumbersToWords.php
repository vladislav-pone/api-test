<?php

namespace App\Services\NumbersToWords\Contracts;

interface ConvertsNumbersToWords
{
    public function convert(int $number): string;
}
