<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberProcessorRequest;
use Illuminate\Http\Response;
use NumberFormatter;

class NumberProcessorController extends Controller
{
    public function __invoke(NumberProcessorRequest $request): Response
    {
        $result = $this->convertNumberToWords(
            $request->get('n'),
            $request->get('lang')
        );
        return response("$result\n");
    }

    protected function convertNumberToWords(string $number, string $locale): string
    {
        $formatter = new NumberFormatter($locale, NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }
}
