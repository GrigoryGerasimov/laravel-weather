<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Models\Weather as WeatherModel;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Support\Collection;

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
    public function test_receiving_a_valid_forecast_collection(): void
    {
        $this->withoutExceptionHandling();

        $forecastWeather = Weather::apiType('forecast')->apiKey()->ip('89.102.230.88')->forecastDays(3)->get();

        $this->assertNotNull($forecastWeather);
        $this->assertTrue($forecastWeather instanceof WeatherModel);
        $this->assertTrue($forecastWeather->forecast() instanceof Collection);

        $forecastArray = $forecastWeather->forecast()->toArray();

        $this->assertCount(3, $forecastArray);
    }

    /** @test */
    public function test_receiving_a_valid_marine_collection(): void
    {
        $this->withoutExceptionHandling();

        $forecastWeather = Weather::apiType('marine')->apiKey()->zip('40011')->forecastDays(5)->get();

        $this->assertNotNull($forecastWeather);
        $this->assertTrue($forecastWeather instanceof WeatherModel);
        $this->assertTrue($forecastWeather->marine() instanceof Collection);

        $marineArray = $forecastWeather->marine()->toArray();

        $this->assertCount(5, $marineArray);
    }

    /** @test */
    public function test_receiving_a_valid_weather_search_object(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('search')->apiKey('52bc4de23bad4639861233754230306')->city('Prague')->get();

        $this->assertNotNull($weather);
        $this->assertTrue($weather->search() instanceof Collection);
    }

    /** @test */
    public function test_receiving_a_valid_timezone_object(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('timezone')->apiKey('52bc4de23bad4639861233754230306')->city('Prague')->get();

        $this->assertNotNull($weather);
        $this->assertTrue($weather instanceof WeatherModel);

        $timezone = $weather->timezone();

        $this->assertNotNull($timezone);
        $this->assertisObject($timezone);
    }

    /** @test */
    public function test_receiving_a_valid_sports_object(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('sports')->apiKey('52bc4de23bad4639861233754230306')->city('Prague')->get();

        $this->assertNotNull($weather);
        $this->assertTrue($weather instanceof WeatherModel);

        $sports = $weather->sports();

        $this->assertNotNull($sports);
        $this->assertisObject($sports);
    }

    /** @test */
    public function test_receiving_a_valid_astronomy_object(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('astronomy')->apiKey('52bc4de23bad4639861233754230306')->city('Prague')->get();

        $this->assertNotNull($weather);
        $this->assertTrue($weather instanceof WeatherModel);

        $astronomy = $weather->astro();

        $this->assertNotNull($astronomy);
        $this->assertisObject($astronomy);
    }

    /** @test */
    public function test_receiving_a_valid_iplookup_object(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('ip')->apiKey('52bc4de23bad4639861233754230306')->city('Prague')->get();

        $this->assertNotNull($weather);
        $this->assertTrue($weather instanceof WeatherModel);

        $ipLookup = $weather->ipLookup();

        $this->assertNotNull($ipLookup);
        $this->assertisObject($ipLookup);
    }
}