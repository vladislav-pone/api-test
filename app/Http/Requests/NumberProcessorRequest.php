<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

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
            'lang' => ['string', 'required', 'size:3', Rule::in(array_keys(self::NORMALIZED_LOCALES))],
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
