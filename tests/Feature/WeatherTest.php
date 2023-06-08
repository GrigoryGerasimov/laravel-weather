<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Models\Weather as WeatherModel;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class WeatherTest extends TestCase
{
    use InteractsWithExceptionHandling;

    /** @test */
    public function test_receiving_a_valid_current_weather_location_object(): void
    {
        $this->withoutExceptionHandling();

        $currentWeather = Weather::apiType('current')->apiKey('52bc4de23bad4639861233754230306')->city('London')->get();

        $this->assertNotNull($currentWeather);
        $this->assertTrue($currentWeather instanceof WeatherModel);

        $location = $currentWeather->location();

        $this->assertNotNull($location);
        $this->assertisObject($location);
    }

    /** @test */
    public function test_receiving_a_valid_forecast_array(): void
    {
        $this->withoutExceptionHandling();

        $forecastWeather = Weather::apiType('forecast')->apiKey()->ip('89.102.230.88')->get();

        $this->assertNotNull($forecastWeather);
        $this->assertTrue($forecastWeather instanceof WeatherModel);

        $forecastSet = $forecastWeather->forecast();

        $this->assertIsArray($forecastSet);
        $this->assertCount(4, $forecastSet);
        $this->assertArrayHasKey('forecast_day', $forecastSet);
    }

    /** @test */
    public function test_receiving_a_valid_marine_array(): void
    {
        $this->withoutExceptionHandling();

        $forecastWeather = Weather::apiType('marine')->apiKey()->zip('40011')->get();

        $this->assertNotNull($forecastWeather);
        $this->assertTrue($forecastWeather instanceof WeatherModel);

        $marineSet = $forecastWeather->marine();

        $this->assertIsArray($marineSet);
        $this->assertCount(5, $marineSet);
        $this->assertArrayHasKey('marine_tides', $marineSet);
    }
}