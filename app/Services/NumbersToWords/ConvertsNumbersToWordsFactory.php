<?php

namespace App\Services\NumbersToWords;

use App\Services\NumbersToWords\Contracts\ConvertsNumbersToWords;
use App\Services\NumbersToWords\Converters\ConvertsNumbersToEnglishWordsService;
use App\Services\NumbersToWords\Converters\ConvertsNumbersToLatvianWordsService;
use App\Services\NumbersToWords\Exceptions\LocaleNotFoundException;

class ConvertsNumbersToWordsFactory
{
    /**
     * @throws LocaleNotFoundException
     */
    public function build(string $locale): ConvertsNumbersToWords
    {
        switch ($locale)
        {
            case ConvertsNumbersToEnglishWordsService::LOCALE_NAME:
                return new ConvertsNumbersToEnglishWordsService();
            case ConvertsNumbersToLatvianWordsService::LOCALE_NAME:
                return new ConvertsNumbersToLatvianWordsService();
        }
        throw new LocaleNotFoundException('Could not provide Converter Services based on required locale.');
    }
}
