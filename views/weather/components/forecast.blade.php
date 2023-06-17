<h4>Weather Forecast</h4>

@foreach($weatherForecast as $weatherForecastItem)
    <ul>
        @if(is_null($weatherForecastItem))
            <li>No weather forecast data available</li>
        @endif

        @if(!is_null($weatherForecastItem->common()))
            <li>Forecast date: {{ $weatherForecastItem->common()->getDate() }}</li>
            <li>Forecast timestamp: {{ $weatherForecastItem->common()->getDateTimestamp() }}</li>
        @endif

        @if(!is_null($weatherForecastItem->day()))
            <li>Maximum temperature in Celsius for the day: {{ $weatherForecastItem->day()->getMaxCelsius() }}</li>
            <li>Maximum temperature in Fahrenheit for the
                day: {{ $weatherForecastItem->day()->getMaxFahrenheit() }}</li>
            <li>Minimum temperature in Celsius for the day: {{ $weatherForecastItem->day()->getMinCelsius() }}</li>
            <li>Minimum temperature in Fahrenheit for the
                day: {{ $weatherForecastItem->day()->getMinFahrenheit() }}</li>
            <li>Average temperature in Celsius for the day: {{ $weatherForecastItem->day()->getAvgCelsius() }}</li>
            <li>Average temperature in Fahrenheit for the
                day: {{ $weatherForecastItem->day()->getAvgFahrenheit() }}</li>
            <li>Maximum wind speed in miles per
                hour: {{ $weatherForecastItem->day()->getMaxWindSpeedInMiles() }}</li>
            <li>Maximum wind speed in kilometer per
                hour: {{ $weatherForecastItem->day()->getMaxWindSpeedInKm() }}</li>
            <li>Total precipitation in
                millimeters: {{ $weatherForecastItem->day()->getTotalPrecipitationInMm() }}</li>
            <li>Total precipitation in
                inches: {{ $weatherForecastItem->day()->getTotalPrecipitationInInches() }}</li>
            <li>Average visibility in kilometers: {{ $weatherForecastItem->day()->getAvgVisibilityInKm() }}</li>
            <li>Average visibility in miles: {{ $weatherForecastItem->day()->getAvgVisibilityInMiles() }}</li>
            <li>Average humidity as percentage: {{ $weatherForecastItem->day()->getAvgHumidity() }}</li>
            <li>UV Index: {{ $weatherForecastItem->day()->getUVIndex() }}</li>

            @if(!is_null($weatherForecastItem->day()->getWeatherCondition()))
                <x-weather-condition :weatherCondition='$weatherForecastItem->day()->getWeatherCondition()'/>
            @endif

            @if(!is_null($weatherForecastItem->day()->getAirQuality()))
                <x-weather-air :weatherAQI='$weatherForecastItem->day()->getAirQuality()'/>
            @endif
        @endif

        @if(!is_null($weatherForecastItem->astro()) && !is_null($weatherForecastItem->astro()->getCommonAstronomyParams()))
            <x-weather-astronomy :weatherAstro='$weatherForecastItem->astro()->getCommonAstronomyParams()'/>
        @endif

        @foreach($weatherForecastItem->hour() as $forecastHour)
            @if(is_null($forecastHour))
                <li>No weather forecast data per hour available</li>
            @endif

            <li>Timestamp: {{ $forecastHour->getTimestamp() }}</li>
            <li>Date and time: {{ $forecastHour->getDateTime() }}</li>
            <li>Temperature in Celsius: {{ $forecastHour->getActualCelsius() }}</li>
            <li>Temperature in Fahrenheit: {{ $forecastHour->getActualFahrenheit() }}</li>

            @if(!is_null($forecastHour->getWeatherCondition()))
                <x-weather-condition :weatherCondition='$forecastHour->getWeatherCondition()'/>
            @endif

            <li>Maximum wind speed in miles per hour: {{ $forecastHour->getWindSpeedInMiles() }}</li>
            <li>Maximum wind speed in kilometers per hour: {{ $forecastHour->getWindSpeedInKm() }}</li>
            <li>Wind direction in degrees: {{ $forecastHour->getWindDirectionInDegrees() }}</li>
            <li>Wind direction as 16 point compass. e.g.: NSW: {{ $forecastHour->getWindDirectionInPoints() }}</li>
            <li>Pressure in millibars: {{ $forecastHour->getPressureInMillibars() }}</li>
            <li>Pressure in inches: {{ $forecastHour->getPressureInInches() }}</li>
            <li>Precipitation amount in millimeters: {{ $forecastHour->getPrecipitationInMm() }}</li>
            <li>Precipitation amount in inches: {{ $forecastHour->getPrecipitationInInches() }}</li>
            <li>Humidity as percentage: {{ $forecastHour->getHumidity() }}</li>
            <li>Cloud cover as percentage: {{ $forecastHour->getCloudCover() }}</li>
            <li>Feels like temperature as Celsius: {{ $forecastHour->getFeelsLikeCelsius() }}</li>
            <li>Feels like temperature as Fahrenheit: {{ $forecastHour->getFeelsLikeFahrenheit() }}</li>
            <li>Windchill temperature in Celsius: {{ $forecastHour->getWindchillInCelsius() }}</li>
            <li>Windchill temperature in Fahrenheit: {{ $forecastHour->getWindchillInFahrenheit() }}</li>
            <li>Heat index in Celsius: {{ $forecastHour->getHeatIndexInCelsius() }}</li>
            <li>Heat index in Fahrenheit: {{ $forecastHour->getHeatIndexInFahrenheit() }}</li>
            <li>Dew point in Celsius: {{ $forecastHour->getDewPointInCelsius() }}</li>
            <li>Dew point in Fahrenheit: {{ $forecastHour->getDewPointInFahrenheit() }}</li>
            <li>Will it rain?: {{ $forecastHour->shallItRain() === 1 ? 'yes' : 'no' }}</li>
            <li>Will it snow?: {{ $forecastHour->shallItSnow() === 1 ? 'yes' : 'no' }}</li>
            <li>Is it day?: {{ $forecastHour->getDayNightConditionIcon() === 1 ? 'yes' : 'no' }}</li>
            <li>Visibility in kilometers: {{ $forecastHour->getVisibilityInKm() }}</li>
            <li>Visibility in miles: {{ $forecastHour->getVisibilityInMiles() }}</li>
            <li>Chance of rain as percentage: {{ $forecastHour->getRainChance() }}</li>
            <li>Chance of snow as percentage: {{ $forecastHour->getSnowChance() }}</li>
            <li>Wind gust in miles per hour: {{ $forecastHour->getWindGustInMiles() }}</li>
            <li>Wind gust in kilometers per hour: {{ $forecastHour->getWindGustInKm() }}</li>
            <li>UV Index: {{ $forecastHour->getUVIndex() }}</li>

            @if(!is_null($forecastHour->getAirQuality()))
                <x-weather-air :weatherAQI='$forecastHour->getAirQuality()'/>
            @endif
        @endforeach
    </ul>
@endforeach