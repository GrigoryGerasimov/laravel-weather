<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use GrigoryGerasimov\Weather\Exceptions\{
    InvalidApiTypeException,
    InvalidArgumentValueException,
    MissingApiFieldException,
    ReceivedApiErrorCodeException
};
use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Tests\TestCase;

class WeatherServiceExceptionsTest extends TestCase
{
    use InteractsWithExceptionHandling;

    /**
     * @test
     * @return void
     */
    public function test_getting_an_invalid_api_type_exception(): void
    {
        $this->assertThrows(fn() => Weather::api('some_invalid_type'), InvalidApiTypeException::class, 'Invalid type of api method provided');
    }

    /**
     * @test
     * @return void
     */
    public function test_getting_a_missing_api_type_exception(): void
    {
        $this->expectException(MissingApiFieldException::class);
        $this->expectExceptionMessage('Api method field missing');

        Weather::city('Prague')->get();
    }

    /**
     * @test
     * @return void
     */
    public function test_getting_an_invalid_argument_value_exception(): void
    {
        $this->expectException(InvalidArgumentValueException::class);
        $this->expectExceptionMessage('Invalid argument value provided');

        Weather::api('forecast')->ip('89.102.230.88')->forecastDays(0)->get();
        Weather::api('forecast')->autoIp()->forecastDays(125)->get();
        Weather::api('history')->city('Brno')->forecastHistoryHour(-3)->get();
        Weather::api('history')->city('Tokio')->forecastHistoryHour(37)->get();
    }

    /**
     * @test
     * @return void
     */
    public function test_getting_a_received_api_error_code_exception(): void
    {
        $weather = Weather::api()->get();

        $this->assertThrows(fn() => $weather->current(), ReceivedApiErrorCodeException::class);
    }

    /**
     * @test
     * @return void
     */
    public function test_getting_a_received_api_error_code_exception_without_api_key(): void
    {
        $weather = Weather::api()->get();

        $this->assertThrows(fn() => $weather->current(), ReceivedApiErrorCodeException::class);
    }
}