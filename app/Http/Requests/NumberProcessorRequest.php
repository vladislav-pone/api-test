<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class NumberProcessorRequest extends AbstractApiFormRequest
{
    public const NORMALIZED_LOCALES = [
        'eng' => 'en',
        'lat' => 'lv',
    ];

    public function rules(): array
    {
        return [
            'n' => ['integer', 'required', 'min:0', 'max:9999'],
            'lang' => ['string', 'required', 'size:3'], // TODO check if selected locale exists
        ];
    }

    protected function passedValidation(): void
    {
        $validated = $this->validated();
        $this->replace([
            'lang' => self::NORMALIZED_LOCALES[$validated['lang']]
        ]);
    }
}