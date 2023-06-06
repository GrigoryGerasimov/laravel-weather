<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class CurrentWeatherTest extends TestCase
{
    use InteractsWithExceptionHandling;

    /** @test */
    public function test_receiving_a_valid_current_weather_location_mark(): void
    {
        $this->withoutExceptionHandling();

        $currentWeather = Weather::apiKey('52bc4de23bad4639861233754230306')->location('London');

        $this->assertNotNull($currentWeather?->getLocationMark());
        $this->assertIsArray($currentWeather?->getLocationMark());
        $this->assertEquals(['London', 'United Kingdom'], $currentWeather?->getLocationMark());
    }

    /** @test */
    public function test_receiving_an_invalid_current_weather_location_mark(): void
    {
        $currentWeather = Weather::apiKey('52bc4de23bad4639861233754230306')->location('Prague');

        $this->assertNotNull($currentWeather?->getLocationMark());
        $this->assertIsArray($currentWeather?->getLocationMark());
        $this->assertNotEquals(['London', 'United Kingdom'], $currentWeather?->getLocationMark());
    }

    /** @test */
    public function test_receiving_current_weather_temp_in_celsius(): void
    {
        $this->withoutExceptionHandling();

        $currentWeather = Weather::apiKey('52bc4de23bad4639861233754230306')->location('China');

        $this->assertNotNull($currentWeather);
        $this->assertIsFloat($currentWeather?->getCelsius());
    }

    /** @test */
    public function test_receiving_current_weather_temp_in_fahrenheit(): void
    {
        $this->withoutExceptionHandling();

        $currentWeather = Weather::apiKey('52bc4de23bad4639861233754230306')->location('France');

        $this->assertNotNull($currentWeather);
        $this->assertIsFloat($currentWeather?->getFahrenheit());
    }

    /** @test */
    public function test_receiving_current_weather_correct_local_coords(): void
    {
        $this->withoutExceptionHandling();

        $currentWeather = Weather::apiKey('52bc4de23bad4639861233754230306')->location('Prague');

        $this->assertNotNull($currentWeather?->getLocalCoords());
        $this->assertEquals([50.08, 14.47], $currentWeather?->getLocalCoords());
    }
}