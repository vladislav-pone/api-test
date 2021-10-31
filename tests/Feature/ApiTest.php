<?php

namespace Tests\Feature;

use App\Http\Requests\NumberProcessorRequest;
use Exception;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_valid_numbers(): void
    {
        $randomNumbers = Collection::times(10, function () {
            return $this->getValidNumber();
        });
        foreach ($randomNumbers as $randomNumber) {
            $randomLocale = $this->getValidLocale();
            $request = $this->get("/?n=$randomNumber&lang=$randomLocale");
            $request->assertStatus(Response::HTTP_OK);
        }
    }

    public function test_invalid_numbers(): void
    {
        $validLocale = $this->getValidLocale();
        $lowerNumber = NumberProcessorRequest::MIN_NUMBER - 1;
        $higherNumber = NumberProcessorRequest::MAX_NUMBER + 1;

        $request = $this->get("/?n=$lowerNumber&lang=$validLocale");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $request = $this->get("/?n=$higherNumber&lang=$validLocale");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @throws Exception
     */
    public function test_invalid_locale(): void
    {
        $validNumber = $this->getValidNumber();

        $request = $this->get("/?n=$validNumber&lang=dev");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $request = $this->get("/?n=$validNumber&lang=en");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $request = $this->get("/?n=$validNumber&lang=english");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @throws Exception
     */
    public function test_missing_required_params(): void
    {
        $validNumber = $this->getValidNumber();
        $validLocale = $this->getValidLocale();

        $request = $this->get("/");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $request = $this->get("/?lang=$validLocale");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $request = $this->get("/?n=$validNumber");
        $request->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @throws Exception
     */
    protected function getValidNumber(): int
    {
        return random_int(NumberProcessorRequest::MIN_NUMBER, NumberProcessorRequest::MAX_NUMBER);
    }

    protected function getValidLocale(): string
    {
        return collect(array_keys(NumberProcessorRequest::NORMALIZED_LOCALES))->random();
    }
}
