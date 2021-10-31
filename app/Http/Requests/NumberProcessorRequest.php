<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class NumberProcessorRequest extends AbstractApiFormRequest
{

    public const MIN_NUMBER = 0;
    public const MAX_NUMBER = 9999;
    public const NORMALIZED_LOCALES = [
        'eng' => 'en',
        'lat' => 'lv',
    ];

    public function rules(): array
    {
        $minN = self::MIN_NUMBER;
        $maxN = self::MAX_NUMBER;
        return [
            'n' => ['integer', 'required', "min:$minN", "max:$maxN"],
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
