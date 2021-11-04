<?php

namespace App\Services\NumbersToWords\Converters;

use App\Services\NumbersToWords\Contracts\ConvertsNumbersToWords;
use App\Services\NumbersToWords\Dictionaries\Latvian as Dictionary;

class ConvertsNumbersToLatvianWordsService implements ConvertsNumbersToWords
{
    public const LOCALE_NAME = 'lv';

    public function convert(int $number): string
    {
        if ($number === 0) {
            return Dictionary::ZERO;
        }

        return $this->prettifyString(
            $this->parseThousands($number) . ' ' .
            $this->parseHundreds($number) . ' ' .
            $this->parseTail($number)
        );
    }

    protected function prettifyString(string $str): string
    {
        return str_replace('  ', ' ', trim($str));
    }

    protected function parseThousands(int &$number): string
    {
        if ($number < 1000) {
            return '';
        }

        $thousands = (int) floor($number / 1000);
        $number %= 1000;

        if ($number > 0) {
            return Dictionary::THOUSANDS[$thousands];
        }
        return Dictionary::THOUSANDS_FINAL[$thousands];
    }

    protected function parseHundreds(int &$number): string
    {
        if ($number < 100) {
            return '';
        }

        $hundreds = (int) floor($number / 100);
        $number %= 100;

        if ($number === 0 && $hundreds === 1) {
            return Dictionary::HUNDREDS[$hundreds] . 's';
        }
        return Dictionary::HUNDREDS[$hundreds];
    }

    /*
     * Parse last 2 digits
     */
    protected function parseTail(int &$number): string
    {
        return match (true) {
            $number === 0 => '',
            $number > 19 => $this->parseTens($number),
            default => $this->parseUnits($number)
        };
    }

    protected function parseTens(int &$number): string
    {
        $tens = (int) floor($number / 10);
        $number %= 10;
        return Dictionary::TENS[$tens] . ' ' . $this->parseUnits($number);
    }

    protected function parseUnits(int $number): string
    {
        return Dictionary::UNITS[$number];
    }
}
