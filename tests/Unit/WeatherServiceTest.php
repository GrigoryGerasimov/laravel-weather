<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Unit;

use GrigoryGerasimov\Weather\Exceptions\InvalidJsonResponseException;
use GrigoryGerasimov\Weather\Exceptions\ReceivedApiErrorCodeException;
use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Objects\AirQuality;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Support\Collection;
use LanguageDetection\Language;

class WeatherServiceTest extends TestCase
{
    use InteractsWithExceptionHandling;

    public function test_receiving_current_weather_object_based_on_coords(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->coords(53.20066, 45.00464)->get();

        $this->assertEquals('Penza', $weather->location()->getCity());
        $this->assertEquals('Russia', $weather->location()->getCountry());
    }

    public function test_receiving_current_weather_object_based_on_city(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->city('Ostrava')->get();

        $this->assertEquals('Ostrava', $weather->location()->getCity());
        $this->assertEquals('Czech Republic', $weather->location()->getCountry());
    }

    public function test_receiving_current_weather_object_based_on_zip(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->zip('L10AY')->get();

        $this->assertEquals('Liverpool', $weather->location()->getCity());
        $this->assertEquals('UK', $weather->location()->getCountry());
    }

    public function test_receiving_current_weather_object_based_on_metar(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->metar('EGLL')->get();

        $this->assertEquals('London / Heathrow Airport', $weather->location()->getCity());
        $this->assertEquals('United Kingdom', $weather->location()->getCountry());
        $this->assertEquals(51.48, $weather->location()->getLatitude());
        $this->assertEquals(-0.45, $weather->location()->getLongitude());
        $this->assertEquals('Europe/London', $weather->timezone()->getTimezoneName());
    }

    public function test_receiving_current_weather_object_based_on_iata(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->iata('DXB')->get();

        $this->assertEquals('Dubai', $weather->location()->getCity());
        $this->assertEquals('United Arab Emirates', $weather->location()->getCountry());
        $this->assertEquals(25.25, $weather->location()->getLatitude());
        $this->assertEquals(55.36, $weather->location()->getLongitude());
        $this->assertEquals('Asia/Dubai', $weather->timezone()->getTimezoneName());
    }

    public function test_receiving_current_weather_object_based_on_ip(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->ip('89.102.230.88')->get();

        $this->assertEquals('Hostivice', $weather->location()->getCity());
        $this->assertEquals('Czech Republic', $weather->location()->getCountry());
        $this->assertEquals(50.08, $weather->location()->getLatitude());
        $this->assertEquals(14.27, $weather->location()->getLongitude());
        $this->assertEquals('Europe/Prague', $weather->timezone()->getTimezoneName());
    }

    public function test_receiving_forecast_weather_object_based_on_forecast_days(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Berlin')->forecastDays(5)->get();

        $this->assertEquals('Berlin', $weather->location()->getCity());
        $this->assertEquals('Germany', $weather->location()->getCountry());

        $forecast = $weather->forecast();
        $this->assertInstanceOf(Collection::class, $forecast);

        $forecastArray = $forecast->toArray();
        $this->assertIsArray($forecastArray);
        $this->assertCount(5, $forecastArray);
        $this->assertArrayHasKey($forecast->first()->common()->getDate(), $forecastArray);
    }

    public function test_receiving_forecast_weather_object_based_on_forecast_history_date(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Manchester')->forecastHistoryDate('2023-06-20')->get();

        $forecast = $weather->forecast();
        $this->assertInstanceOf(Collection::class, $forecast);

        $forecastArray = $forecast->toArray();
        $this->assertArrayHasKey($forecast->first()->common()->getDate(), $forecastArray);
    }

    public function test_getting_an_api_error_while_requesting_a_history_weather_object_based_on_forecast_history_date_with_free_plan_api_key(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('history')->apiKey('52bc4de23bad4639861233754230306')->city('Manchester')->forecastHistoryDate('2010-01-01')->get();

        $this->assertThrows(fn() => $weather->forecast(), ReceivedApiErrorCodeException::class);
    }

    public function test_receiving_forecast_weather_object_based_on_forecast_history_timestamp(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->coords(50.95843, 13.93702)->forecastHistoryTimestamp('1686430800')->get();

        $forecast = $weather->forecast();
        $this->assertInstanceOf(Collection::class, $forecast);

        $forecastArray = $forecast->toArray();
        $this->assertArrayHasKey($forecast->first()->common()->getDate(), $forecastArray);
        $this->assertEquals(1686430800, $forecast->first()->hour()->last()->getTimestamp());
    }

    public function test_receiving_forecast_weather_object_based_on_forecast_history_hour(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Dresden')->forecastHistoryHour(19)->get();

        $forecast = $weather->forecast();
        $this->assertInstanceOf(Collection::class, $forecast);

        $forecastArray = $forecast->toArray();
        $this->assertArrayHasKey($forecast->first()->common()->getDate(), $forecastArray);
    }

    public function test_receiving_forecast_weather_object_requiring_alerts(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Decin')->requireAlerts(true)->get();

        $forecastAlerts = $weather->alerts();

        $this->assertInstanceOf(Collection::class, $forecastAlerts);
    }

    public function test_receiving_null_while_not_requiring_alerts(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Jihlava')->requireAlerts()->get();

        $this->assertNull($weather->alerts());
    }

    public function test_receiving_current_weather_object_requiring_air_quality_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType()->apiKey()->city('Dresden')->requireAQI(true)->get();

        $currentAQI = $weather->airQuality();
        $this->assertInstanceOf(AirQuality::class, $currentAQI);
        $this->assertNotNull($currentAQI->getCarbonMonoxide());
    }

    public function test_receiving_forecast_weather_object_requiring_air_quality_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('forecast')->apiKey()->city('Dresden')->requireAQI(true)->forecastDays(3)->get();

        $forecastAQI = $weather->forecast();
        $this->assertInstanceOf(Collection::class, $forecastAQI);
        $this->assertEquals(1, $forecastAQI->get(date('Y-m-d', time()))->day()->getAirQuality()->getUSEPAStandard());
        $this->assertEquals(1, $forecastAQI->get(date('Y-m-d', time()))->hour()->get(17)->getAirQuality()->getUKDefraIndex());
    }

    public function test_receiving_forecast_weather_object_requiring_tides_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::apiType('marine')->apiKey()->city('Marseilles')->requireTides(true)->forecastDays(4)->get();

        $marineTidesData = $weather->marine();

        $this->assertInstanceOf(Collection::class, $marineTidesData);
        $this->assertEquals(4, $marineTidesData->get(date('Y-m-d', time()))->tides()->count());
        $this->assertNotNull($marineTidesData->get(date('Y-m-d', time()))->tides()->first()->getLocalTideTime());
    }

    public function test_receiving_current_weather_object_condition_text_in_Czech_lang(): void
    {
        $this->withoutExceptionHandling();

        $expectedLang = new Language(['cs']);
        $expectedLangThreshold = 0.4;

        $weather = Weather::apiType()->apiKey()->city('Usti-nad-Labem')->lang('cs')->get();

        $currentWeatherConditionText = $weather->current()->getWeatherCondition()->getText();

        $this->assertIsString($currentWeatherConditionText);
        $this->assertNotNull($expectedLang->detect($currentWeatherConditionText)['cs']);
        $this->assertTrue(round($expectedLang->detect($currentWeatherConditionText)['cs'], 1) >= $expectedLangThreshold);
    }

    public function test_receiving_forecast_weather_object_condition_text_in_German_lang(): void
    {
        $this->withoutExceptionHandling();

        $expectedLang = new Language(['de']);
        $expectedLangThreshold = 0.5;

        $weather = Weather::apiType('forecast')->apiKey()->city('Stockholm')->forecastDays(5)->lang('de')->get();

        $forecastWeatherConditionText = $weather->forecast()->get(date('Y-m-d', time()))->day()->getWeatherCondition()->getText();

        $this->assertIsString($forecastWeatherConditionText);
        $this->assertNotNull($expectedLang->detect($forecastWeatherConditionText)['de']);
        $this->assertTrue(round($expectedLang->detect($forecastWeatherConditionText)['de'], 1) >= $expectedLangThreshold);
    }

    public function test_getting_an_invalid_json_response_exception_due_to_invalid_request_syntax(): void
    {
        $this->expectException(InvalidJsonResponseException::class);
        $this->expectExceptionMessage('Invalid json response. Please kindly check the request syntax');

        Weather::apiType()->apiKey()->city('Děčín')->lang('en')->get();
    }
}