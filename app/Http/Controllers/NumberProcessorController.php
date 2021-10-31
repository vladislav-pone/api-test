<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NumberProcessorController extends Controller
{
    public function __invoke(Request $request): Response
    {
        // TODO Make Request validator
        // TODO Process number from request
        // TODO Add locale support
        return response('success');
    }
}
