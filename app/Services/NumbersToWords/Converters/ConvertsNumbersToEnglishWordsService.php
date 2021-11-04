<?php

namespace App\Services\NumbersToWords\Converters;

use App\Services\NumbersToWords\Contracts\ConvertsNumbersToWords;
use NumberFormatter;

class ConvertsNumbersToEnglishWordsService implements ConvertsNumbersToWords
{
    public const LOCALE_NAME = 'en';

    public function convert(int $number): string
    {
        $formatter = new NumberFormatter(self::LOCALE_NAME, NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }
}
