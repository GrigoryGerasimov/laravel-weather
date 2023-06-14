<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Exceptions\ReceivedApiErrorCodeException;
use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Objects\{Astronomy, Condition, GPS\IpLookup, Sports, Timezone};
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use GrigoryGerasimov\Weather\Objects\GPS\Search;
use GrigoryGerasimov\Weather\Objects\Marine\{Marine, MarineHour, MarineTide};
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Support\Collection;

class WeatherApiMethodTest extends TestCase
{
    use InteractsWithExceptionHandling;

    public function test_receiving_current_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api()->city('Warsaw')->get();

        $this->assertNotNull($weather->current()->getActualCelsius());
        $this->assertIsFloat($weather->current()->getActualCelsius());

        $this->assertNotNull($weather->current()->getFeelsLikeFahrenheit());
        $this->assertIsFloat($weather->current()->getFeelsLikeFahrenheit());

        $this->assertNotNull($weather->current()->getDayNightConditionIcon());
        $this->assertIsInt($weather->current()->getDayNightConditionIcon());
    }

    public function test_receiving_null_insteadof_invalid_current_weather_data(): void
    {
        $forecastMarine = Weather::api('marine')->city('Warsaw')->get();
        $this->assertNull($forecastMarine->current());

        $search = Weather::api('search')->city('Warsaw')->get();
        $this->assertNull($search->current());
    }

    public function test_receiving_forecast_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('forecast')->city('Saratov')->forecastDays(2)->get();

        $forecast = $weather->forecast();

        $this->assertNotNull($forecast);
        $this->assertInstanceOf(Collection::class, $forecast);
        $this->assertContainsOnlyInstancesOf(Forecast::class, $forecast);

        $forecastAstro = $forecast->last()->astro();

        $this->assertNotNull($forecastAstro);
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getSunriseTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getSunsetTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonriseTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonsetTime());
        $this->assertIsString($forecastAstro->getCommonAstronomyParams()->getMoonIllumination());
        $this->assertIsInt($forecastAstro->getCommonAstronomyParams()->isMoonUp());
        $this->assertIsInt($forecastAstro->getCommonAstronomyParams()->isSunUp());
    }

    public function test_receiving_null_insteadof_invalid_forecast_weather_data(): void
    {
        $sports = Weather::api('sports')->ip('137.1.255.255')->get();
        $this->assertNull($sports->forecast());

        $search = Weather::api('search')->ip('137.1.255.255')->get();
        $this->assertNull($search->forecast());
    }

    public function test_receiving_search_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('search')->city('Tallinn')->get();

        $search = $weather->search();

        $this->assertNotNull($search);
        $this->assertInstanceOf(Collection::class, $search);
        $this->assertContainsOnlyInstancesOf(Search::class, $search);

        $this->assertIsString($search->first()->getCity());
        $this->assertIsString($search->first()->getRegion());
        $this->assertIsString($search->first()->getCountry());
        $this->assertIsFloat($search->first()->getLatitude());
        $this->assertIsFloat($search->first()->getLongitude());
        $this->assertIsInt($search->first()->getId());
        $this->assertIsString($search->first()->getUrl());
    }

    public function test_receiving_null_insteadof_invalid_search_weather_data(): void
    {
        $sports = Weather::api('sports')->city('Tallinn')->get();
        $this->assertNull($sports->search());

        $future = Weather::api('future')->city('Tallinn')->historyFutureDate('2024-05-01')->get();
        $this->assertNull($future->search());
    }

    /*
     * The default Free plan API key is limited to get history data.
     */
    public function test_getting_a_received_api_error_code_exception_instead_of_invalid_history_weather_data(): void
    {
        $this->expectException(ReceivedApiErrorCodeException::class);

        $weather = Weather::api('history')->city('Riga')->historyFutureDate('2011-02-11')->get();

        $weather->forecast();
    }

    public function test_receiving_marine_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('marine')->city('Dover')->forecastDays(3)->get();

        $forecastMarine = $weather->marine();

        $this->assertNotNull($forecastMarine);
        $this->assertInstanceOf(Collection::class, $forecastMarine);
        $this->assertContainsOnlyInstancesOf(Marine::class, $forecastMarine);

        $forecastMarineHour = $forecastMarine->last()->hour();

        $this->assertNotNull($forecastMarineHour);
        $this->assertContainsOnlyInstancesOf(MarineHour::class, $forecastMarineHour);
        $this->assertIsInt($forecastMarineHour->first()->getCommonForecastHourParams()->getTimestamp());
        $this->assertIsString($forecastMarineHour->first()->getCommonForecastHourParams()->getDateTime());
        $this->assertIsFloat($forecastMarineHour->first()->getCommonForecastHourParams()->getActualCelsius());
        $this->assertIsFloat($forecastMarineHour->first()->getCommonForecastHourParams()->getActualFahrenheit());
        $this->assertIsString($forecastMarineHour->last()->getCommonForecastHourParams()->getWeatherCondition()->getText());
        $this->assertIsFloat($forecastMarineHour->get(12)->getCommonForecastHourParams()->getWindSpeedInMiles());
        $this->assertIsString($forecastMarineHour->get(13)->getCommonForecastHourParams()->getWindDirectionInPoints());
        $this->assertIsInt($forecastMarineHour->get(17)->getCommonForecastHourParams()->getCloudCover());
        $this->assertIsFloat($forecastMarineHour->get(6)->getCommonForecastHourParams()->getWindchillInCelsius());
        $this->assertIsFloat($forecastMarineHour->get(8)->getCommonForecastHourParams()->getHeatIndexInCelsius());
        $this->assertNull($forecastMarineHour->get(21)->getCommonForecastHourParams()->shallItRain());
        $this->assertNull($forecastMarineHour->last()->getCommonForecastHourParams()->shallItSnow());
        $this->assertIsFloat($forecastMarineHour->get(10)->getSignificantWaveHeight());
        $this->assertIsFloat($forecastMarineHour->get(11)->getSwellWaveHeightInMetres());
        $this->assertIsFloat($forecastMarineHour->last()->getSwellPeriod());
        $this->assertIsFloat($forecastMarineHour->last()->getWaterTemperatureInFahrenheit());
        $this->assertNull($forecastMarineHour->last()->getCommonForecastHourParams()->getAirQuality());

        $forecastMarineTides = $forecastMarine->first()->tides();
        $this->assertNotNull($forecastMarineTides);
        $this->assertContainsOnlyInstancesOf(MarineTide::class, $forecastMarineTides);
        $this->assertIsString($forecastMarineTides->first()->getLocalTideTime());
        $this->assertIsString($forecastMarineTides->first()->getTideHeight());
        $this->assertIsString($forecastMarineTides->last()->getTideType());
    }

    public function test_receiving_null_insteadof_invalid_marine_weather_data(): void
    {
        $weather = Weather::api('marine')->city('Dover')->historyFutureDate('2012-02-12')->get();

        $this->assertEmpty($weather->marine());
    }

    public function test_receiving_future_forecast_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('future')->city('Vilnius')->historyFutureDate('2024-02-25')->requireAQI(true)->get();

        $forecastFuture = $weather->forecast();

        $this->assertNotNull($forecastFuture);
        $this->assertInstanceOf(Collection::class, $forecastFuture);
        $this->assertContainsOnlyInstancesOf(Forecast::class, $forecastFuture);

        $forecastFutureDay = $forecastFuture->last()->day();

        $this->assertNotNull($forecastFutureDay);
        $this->assertIsFloat($forecastFutureDay->getMaxCelsius());
        $this->assertIsFloat($forecastFutureDay->getMaxFahrenheit());
        $this->assertIsFloat($forecastFutureDay->getMinCelsius());
        $this->assertIsFloat($forecastFutureDay->getMinFahrenheit());
        $this->assertIsFloat($forecastFutureDay->getAvgCelsius());
        $this->assertIsFloat($forecastFutureDay->getAvgFahrenheit());
        $this->assertIsFloat($forecastFutureDay->getMaxWindSpeedInMiles());
        $this->assertIsFloat($forecastFutureDay->getMaxWindSpeedInKm());
        $this->assertIsFloat($forecastFutureDay->getTotalPrecipitationInMm());
        $this->assertIsFloat($forecastFutureDay->getTotalPrecipitationInInches());
        $this->assertIsFloat($forecastFutureDay->getAvgVisibilityInKm());
        $this->assertIsFloat($forecastFutureDay->getAvgVisibilityInMiles());
        $this->assertIsFloat($forecastFutureDay->getAvgHumidity());
        $this->assertInstanceOf(Condition::class, $forecastFutureDay->getWeatherCondition());
        $this->assertIsFloat($forecastFutureDay->getUVIndex());

        $forecastFutureLocation = $weather->location();
        $this->assertNotNull($forecastFutureLocation);
        $this->assertEquals('Vilnius', $forecastFutureLocation->getCity());
        $this->assertEquals('Vilniaus Apskritis', $forecastFutureLocation->getRegion());
        $this->assertEquals('Lithuania', $forecastFutureLocation->getCountry());
        $this->assertEquals(25.32, $forecastFutureLocation->getLongitude());
        $this->assertEquals(54.68, $forecastFutureLocation->getLatitude());
        $this->assertInstanceOf(Timezone::class, $forecastFutureLocation->getCommonTimezoneParams());
    }

    public function test_receiving_null_insteadof_invalid_future_forecast_weather_data(): void
    {
        $weather = Weather::api('search')->city('Vilnius')->historyFutureDate('2024-03-18')->get();
        $this->assertEmpty($weather->forecast());

        $ip = Weather::api('ip')->autoIp()->get();
        $this->assertNull($ip->forecast());
    }

    /*
     * Retrieving AirQuality data is only feasible for Forecast API method.
     */
    public function test_receiving_null_air_quality_while_requesting_future_forecast_weather_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('future')->city('Vilnius')->historyFutureDate('2024-02-25')->requireAQI(true)->get();

        $forecastFuture = $weather->forecast();

        $this->assertNull($forecastFuture->first()->day()->getAirQuality());
    }

    public function test_receiving_timezone_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('timezone')->city('Madrid')->get();

        $timezone = $weather->timezone();

        $this->assertNotNull($timezone);
        $this->assertInstanceOf(Timezone::class, $timezone);
        $this->assertIsString($timezone->getTimezoneName());
        $this->assertIsInt($timezone->getTimestamp());
        $this->assertIsString($timezone->getDateTime());
    }

    public function test_receiving_null_insteadof_invalid_timezone_data(): void
    {
        $weather = Weather::api('sports')->city('Madrid')->get();
        $this->assertNull($weather->timezone());

        $search = Weather::api('search')->city('Madrid')->get();
        $this->assertNull($search->timezone());
    }

    public function test_receiving_sports_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('sports')->city('Barcelona')->get();

        $sports = $weather->sports();

        $this->assertNotNull($sports);
        $this->assertInstanceOf(Collection::class, $sports);

        $football = $sports->get('football');

        $this->assertContainsOnlyInstancesOf(Sports::class, $football);
        $this->assertIsString($football->first()->getStadium());
        $this->assertIsString($football->get(2)->getCountry());
        $this->assertIsString($football->last()->getRegion());
        $this->assertIsString($football->get(3)->getTournament());
        $this->assertIsString($football->get(1)->getStartDateTime());
        $this->assertIsString($football->first()->getMatch());
    }

    public function test_receiving_null_insteadof_invalid_sports_data(): void
    {
        $weather = Weather::api('search')->city('Barcelona')->get();

        $this->assertNull($weather->sports());
    }

    public function test_receiving_astronomy_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('astronomy')->ip('46.13.156.111')->get();

        $astro = $weather->astro();

        $this->assertNotNull($astro);
        $this->assertInstanceOf(Astronomy::class, $astro);
        $this->assertIsString($astro->getSunriseTime());
        $this->assertIsString($astro->getSunsetTime());
        $this->assertIsString($astro->getMoonriseTime());
        $this->assertIsString($astro->getMoonsetTime());
        $this->assertIsString($astro->getMoonPhase());
        $this->assertIsString($astro->getMoonIllumination());
        $this->assertIsInt($astro->isMoonUp());
        $this->assertIsInt($astro->isSunUp());
    }

    public function test_receiving_null_insteadof_invalid_astronomy_data(): void
    {
        $weather = Weather::api('forecast')->city('Roznov')->get();
        $this->assertNull($weather->astro());

        $search = Weather::api('search')->city('Roznov')->get();
        $this->assertNull($search->astro());
    }

    public function test_receiving_iplookup_data(): void
    {
        $this->withoutExceptionHandling();

        $weather = Weather::api('ip')->ip('46.13.156.111')->get();

        $ipLookup = $weather->ipLookup();

        $this->assertNotNull($ipLookup);
        $this->assertInstanceOf(IpLookup::class, $ipLookup);
        $this->assertIsString($ipLookup->getIp());
        $this->assertIsString($ipLookup->getIpType());
        $this->assertIsString($ipLookup->getContinentCode());
        $this->assertIsString($ipLookup->getContinent());
        $this->assertIsString($ipLookup->getCountryCode());
        $this->assertIsString($ipLookup->getCountry());
        $this->assertIsString($ipLookup->isInEU());
        $this->assertIsInt($ipLookup->getGeonameID());
        $this->assertIsString($ipLookup->getCity());
        $this->assertIsString($ipLookup->getRegion());
        $this->assertIsFloat($ipLookup->getLatitude());
        $this->assertIsFloat($ipLookup->getLongitude());
        $this->assertIsString($ipLookup->getCommonTimezoneParams()->getTimezoneName());
        $this->assertIsString($ipLookup->getCommonTimezoneParams()->getDateTime());
        $this->assertIsInt($ipLookup->getCommonTimezoneParams()->getTimestamp());
    }

    public function test_receiving_null_insteadof_invalid_iplookup_data(): void
    {
        $weather = Weather::api('search')->ip('46.13.156.111')->get();
        $this->assertNull($weather->ipLookup());

        $sports = Weather::api('sports')->city('Oslo')->get();
        $this->assertNull($sports->ipLookup());
    }
}
