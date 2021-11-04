<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberProcessorRequest;
use Illuminate\Http\Response;

class NumberProcessorController extends Controller
{
    public function __invoke(NumberProcessorRequest $request): Response
    {
        $converter = app('converters.numbersToWords', ['locale' => $request->get('lang')]);
        $result = $converter->convert($request->get('n'));
        return response("$result\n");
    }
}
