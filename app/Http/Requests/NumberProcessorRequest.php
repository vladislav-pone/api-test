<?php

namespace App\Http\Requests;

class NumberProcessorRequest extends AbstractApiFormRequest
{
    public function rules(): array
    {
        return [
            'n' => ['integer', 'required', 'min:0', 'max:9999'],
            'lang' => ['string', 'required', 'size:3'], // TODO check if selected locale exists
        ];
    }
}
