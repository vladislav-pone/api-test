<?php

namespace App\Providers;

use App\Services\NumbersToWords\ConvertsNumbersToWordsFactory;
use App\Services\NumbersToWords\Exceptions\LocaleNotFoundException;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NumbersToWordsConversionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->singleton('converters.numbersToWords', function ($app, array $params = []) {
            if (!isset($params['locale'])) {
                throw new LocaleNotFoundException('Could not build Service without locale');
            }
            $factory = new ConvertsNumbersToWordsFactory();
            return $factory->build($params['locale']);
        });
    }

    public function provides()
    {
        return ['converters.numbersToWords'];
    }
}
