<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Services;

use GrigoryGerasimov\Weather\Models\CurrentWeather;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Http\JsonResponse;

class WeatherService
{
    private string $requestUri;

    public function __construct()
    {
        $this->requestUri = 'https://api.weatherapi.com/v1/current.json?';
    }

    public function apiKey(string $apiKey): self
    {
        $this->requestUri = $this->requestUri . 'key=' . $apiKey;

        return $this;
    }

    public function location(string $location): ?CurrentWeather
    {
        $this->requestUri = $this->requestUri . '&q=' . $location;

        $response = $this->getData();

        return !is_null($response) ? new CurrentWeather($response) : null;
    }

    private function getData(): ?\stdClass
    {
        $curl = curl_init($this->requestUri);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response ? json_decode($response) : null;
    }
}