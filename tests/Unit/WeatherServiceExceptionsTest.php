<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use GrigoryGerasimov\Weather\Exceptions\{
    InvalidApiTypeException,
    InvalidArgumentValueException,
    MissingApiKeyFieldException,
    MissingApiMethodFieldException,
    WeatherException
};
use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Tests\TestCase;

class WeatherServiceExceptionsTest extends TestCase
{
    use InteractsWithExceptionHandling;

    /** @test */
    public function test_getting_an_invalid_api_type_exception(): void
    {
        $this->assertThrows(fn() => Weather::apiType('some_invalid_type'), InvalidApiTypeException::class, 'Invalid type of api method provided');
    }

    /** @test */
    public function test_getting_a_missing_api_type_exception(): void
    {
        $this->expectException(MissingApiMethodFieldException::class);
        $this->expectExceptionMessage('Api method field missing');

        Weather::apiKey()->city('Prague')->get();
    }

    /** @test */
    public function test_getting_a_missing_api_key_exception(): void
    {
        $this->assertThrows(fn() => Weather::apiType('forecast')->zip('40011')->withInterval()->get(), MissingApiKeyFieldException::class, 'Api key field missing');
    }

    /** @test */
    public function test_getting_exception_with_both_api_method_and_key_fields_missing(): void
    {
        $this->assertThrows(fn() => Weather::ip('89.102.230.88')->forecastDays(5)->get(), WeatherException::class);
    }

    /** @test */
    public function test_getting_an_invalid_argument_value_exception(): void
    {
        $this->expectException(InvalidArgumentValueException::class);
        $this->expectExceptionMessage('Invalid argument value provided');

        Weather::apiType('forecast')->apiKey()->ip('89.102.230.88')->forecastDays(0)->get();
        Weather::apiType('forecast')->apiKey()->autoIp()->forecastDays(125)->get();
        Weather::apiType('history')->apiKey()->city('Brno')->forecastHistoryHour(-3)->get();
        Weather::apiType('history')->apiKey()->city('Tokio')->forecastHistoryHour(37)->get();
    }
}