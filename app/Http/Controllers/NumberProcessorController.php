<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberProcessorRequest;
use Illuminate\Http\Response;

class NumberProcessorController extends Controller
{
    public function __invoke(NumberProcessorRequest $request): Response
    {
        // TODO Process number from request
        // TODO Add locale support
        return response('success');
    }
}
