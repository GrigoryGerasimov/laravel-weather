<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Services;

use GrigoryGerasimov\Weather\Exceptions\{
    InvalidApiTypeException,
    InvalidArgumentValueException,
    MissingApiKeyFieldException,
    MissingApiMethodFieldException
};
use GrigoryGerasimov\Weather\Models\Weather;
use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;

class WeatherService implements WeatherServiceInterface
{
    private const DEFAULT_API_KEY = '52bc4de23bad4639861233754230306';

    private const BASE_URL = 'https://api.weatherapi.com/v1';

    private const API_METHOD_TYPES = [
        'current',
        'forecast',
        'search',
        'history',
        'marine',
        'future',
        'timezone',
        'sports',
        'astronomy',
        'ip'
    ];

    private string $requestUri;

    public function __construct()
    {
        $this->requestUri = self::BASE_URL;
    }

    /*
     * Type of your request to the API which defines the appropriate API method.
     * You can find the list of the available types in the constant API_METHOD_TYPES.
     * The default value is "current" for current weather data requests.
     */
    public function apiType(string $type = 'current'): self
    {
        try {
            if (!in_array($type, self::API_METHOD_TYPES, true)) {
                throw new InvalidApiTypeException();
            }
            $this->requestUri = $this->requestUri . "/$type.json";
        } catch (InvalidApiTypeException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
        }

        return $this;
    }

    public function apiKey(string $key = self::DEFAULT_API_KEY): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            }
            $this->requestUri = $this->requestUri . "?key=$key";
        } catch (MissingApiMethodFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * GPS coordinates in decimal degree (as latitude and longitude).
     */
    public function coords(string $lat, string $lon): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&q=$lat,$lon";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    public function city(string $city): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&q=$city";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Here you are free to provide any types of zip/post/postal codes.
     */
    public function zip(string $zipCode): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&p=$zipCode";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * The METAR code provides the direction of the wind relative to true north,
     * as well as the average wind speed expressed in knots.
     */
    public function metar(string $metarCode): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&p=metar:$metarCode";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * An IATA airport code is a three-letter geocode designating many airports and metropolitan areas
     * around the world, defined by the International Air Transport Association (IATA).
     */
    public function iata(string $iataCode): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&p=iata:$iataCode";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    public function autoIp(string $ip): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&p=auto:$ip";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    public function ip(string $ip): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&p=$ip";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Required only with forecast API method.
     *
     * Forecast days range: 1-14.
     */
    public function forecastDays(int $days = 1): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }

            if ($days < 1 || $days > 14) {
                throw new InvalidArgumentValueException();
            }

            $this->requestUri = $this->requestUri . "&days=$days";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException | InvalidArgumentValueException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Restricts date output for Forecast and History API method.
     *
     * For history API 'dt' should be on or after 1st Jan, 2010 in yyyy-MM-dd format (i.e. dt=2010-01-01).
     * For forecast API 'dt' should be between today and next 14 day in yyyy-MM-dd format (i.e. dt=2010-01-01).
     * For future API 'dt' should be between 14 days and 300 days from today in the future in yyyy-MM-dd format (i.e. dt=2023-01-01).
     *
     * More details here: https://www.weatherapi.com/docs/
     */
    public function forecastHistoryDate(string $date): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&dt=$date";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Restrict date output for History API method.
     *
     * For history API 'end_dt' should be on or after 1st Jan, 2010 in yyyy-MM-dd format (i.e. dt=2010-01-01),
     * 'end_dt' should be greater than 'dt' parameter and difference should not be more than 30 days between the two dates.
     *
     * For this query option, your api key should refer to only Pro plan and above.
     *
     * More details here: https://www.weatherapi.com/docs/
     */
    public function historyDate(string $date): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&end_dt=$date";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Unix Timestamp used by Forecast and History API method.
     *
     * unixdt has same restriction as 'dt' parameter.
     * Please either pass 'dt' or 'unixdt' and not both in same request.
     *
     * More details here: https://www.weatherapi.com/docs/
     */
    public function forecastHistoryTimestamp(string|int $timestamp): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&unixdt=$timestamp";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Unix Timestamp used by History API method.
     *
     * unixend_dt has same restriction as 'end_dt' parameter.
     * Please either pass 'end_dt' or 'unixend_dt' and not both in same request.
     *
     * More details here: https://www.weatherapi.com/docs/
     */
    public function historyTimestamp(string|int $timestamp): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&unixend_dt=$timestamp";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Restricting forecast or history output to a specific hour in a given day.
     *
     * Must be in 24 hour. For example 5 pm should be hour=17, 6 am as hour=6
     *
     * More details here: https://www.weatherapi.com/docs/
     */
    public function forecastHistoryHour(int $hour): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }

            if ($hour < 0 || $hour > 24) {
                throw new InvalidArgumentValueException();
            }

            $this->requestUri = $this->requestUri . "&hour=$hour";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException | InvalidArgumentValueException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Should receive alerts in forecast API output.
     *
     * Further details to alerts can be found in the official WeatherApi doc: https://www.weatherapi.com/docs/
     */
    public function requireAlerts(bool $shouldAlert): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $shouldAlert = $shouldAlert ? 'yes' : 'no';
            $this->requestUri = $this->requestUri . "&alerts=$shouldAlert";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Should receive the Air Quality data in forecast API output.
     *
     * Further details to AQI can be found in the official WeatherApi doc: https://www.weatherapi.com/docs/
     */
    public function requireAQI(bool $ifAqi): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $ifAqi = $ifAqi ? 'yes' : 'no';
            $this->requestUri = $this->requestUri . "&aqi=$$ifAqi";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Should receive the Tide data in Marine API output.
     */
    public function requireTides(bool $ifTides): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $ifTides = $ifTides ? 'yes' : 'no';
            $this->requestUri = $this->requestUri . "&tides=$ifTides";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Get 15 min interval data for Forecast and History API.
     *
     * Please note that this option is available for Enterprise plan only.
     */
    public function withInterval(): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&tp=15";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    /*
     * Returns 'condition:text' field in API in the desired language.
     *
     * For the precise lang codes list please refer to the official WeatherApi doc: https://www.weatherapi.com/docs/
     */
    public function lang(string $langCode): self
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $this->requestUri = $this->requestUri . "&lang=$langCode";
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return $this;
    }

    public function get(): ?Weather
    {
        try {
            if (!$this->isApiMethodFieldPresent()) {
                throw new MissingApiMethodFieldException();
            } elseif (!$this->isApiKeyFieldPresent()) {
                throw new MissingApiKeyFieldException();
            }
            $response = $this->getData();
        } catch (MissingApiMethodFieldException | MissingApiKeyFieldException $e) {
            die($e->getMessage());
        } catch (\Throwable $e) {
            error_log($e->getTraceAsString());
            die($e->getMessage());
        }

        return !is_null($response) ? new Weather($response) : null;
    }

    private function isApiMethodFieldPresent(): bool
    {
        return (bool)preg_match('/\/[a-zA-Z0-9]+\.json/', $this->requestUri);
    }

    private function isApiKeyFieldPresent(): bool
    {
        return (bool)preg_match('/\?key=/', $this->requestUri);
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