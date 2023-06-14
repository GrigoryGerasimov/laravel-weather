<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Feature;

use GrigoryGerasimov\Weather\Exceptions\FailedFetchDataException;
use GrigoryGerasimov\Weather\Exceptions\InvalidJsonResponseException;
use GrigoryGerasimov\Weather\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class WeatherApiTest extends TestCase
{
    use InteractsWithExceptionHandling;

    /** @test */
    public function test_receiving_an_error_without_api_key(): void
    {
        $this
            ->getJson('https://api.weatherapi.com/v1/current.json?&q=Germany')
            ->assertStatus(404)
            ->assertNotFound()
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function test_receiving_an_error_with_an_invalid_api_key(): void
    {
        $this
            ->getJson('https://api.weatherapi.com/v1/current.json?key=111&q=Japan')
            ->assertStatus(404)
            ->assertNotFound()
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function test_receiving_an_error_with_an_invalid_location_query(): void
    {
        $this
            ->getJson('https://api.weatherapi.com/v1/current.json?key=52bc4de23bad4639861233754230306')
            ->assertStatus(404)
            ->assertNotFound()
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function test_getting_a_failed_fetch_data_exception(): void
    {
        function mockDataFetch(): void
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            if ($response === false) {
                throw new FailedFetchDataException();
            }
        }

        $this->expectException(FailedFetchDataException::class);
        $this->expectExceptionMessage('Failed to fetch data');

        mockDataFetch();
    }

    public function test_getting_an_invalid_json_response_exception_on_empty_response(): void
    {
        function mockDataFetchAsEmptyString(): void
        {
            $curl = curl_init('https://api.weatherapi.com/&q=Penza');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            if ($response === '') {
                throw new InvalidJsonResponseException();
            }
        }

        $this->expectException(InvalidJsonResponseException::class);
        $this->expectExceptionMessage('Invalid json response. Please kindly check the request syntax');

        mockDataFetchAsEmptyString();
    }

    public function test_getting_an_invalid_json_response_exception_on_html_response(): void
    {
        function mockDataFetchAsHTML(): void
        {
            $curl = curl_init('https://api.weatherapi.com/?key=&q=Penza');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            if (preg_match('/(<.+>)|(<\/.+>)/', $response)) {
                throw new InvalidJsonResponseException();
            }
        }

        $this->expectException(InvalidJsonResponseException::class);
        $this->expectExceptionMessage('Invalid json response. Please kindly check the request syntax');

        mockDataFetchAsHTML();
    }
}