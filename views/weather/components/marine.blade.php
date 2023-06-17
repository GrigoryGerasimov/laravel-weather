<h4>Weather Marine Forecast</h4>

@foreach($weatherMarine as $weatherMarineItem)
    <ul>
        @if(is_null($weatherMarineItem))
            <li>No weather forecast data available</li>
        @endif

        @if(!is_null($weatherMarineItem->common()))
            <li>Forecast date: {{ $weatherMarineItem->common()->getDate() }}</li>
            <li>Forecast timestamp: {{ $weatherMarineItem->common()->getDateTimestamp() }}</li>
        @endif

        @if(!is_null($weatherMarineItem->day()))
            <li>Maximum temperature in Celsius for the day: {{ $weatherMarineItem->day()->getMaxCelsius() }}</li>
            <li>Maximum temperature in Fahrenheit for the
                day: {{ $weatherMarineItem->day()->getMaxFahrenheit() }}</li>
            <li>Minimum temperature in Celsius for the day: {{ $weatherMarineItem->day()->getMinCelsius() }}</li>
            <li>Minimum temperature in Fahrenheit for the
                day: {{ $weatherMarineItem->day()->getMinFahrenheit() }}</li>
            <li>Average temperature in Celsius for the day: {{ $weatherMarineItem->day()->getAvgCelsius() }}</li>
            <li>Average temperature in Fahrenheit for the
                day: {{ $weatherMarineItem->day()->getAvgFahrenheit() }}</li>
            <li>Maximum wind speed in miles per
                hour: {{ $weatherMarineItem->day()->getMaxWindSpeedInMiles() }}</li>
            <li>Maximum wind speed in kilometer per
                hour: {{ $weatherMarineItem->day()->getMaxWindSpeedInKm() }}</li>
            <li>Total precipitation in
                millimeters: {{ $weatherMarineItem->day()->getTotalPrecipitationInMm() }}</li>
            <li>Total precipitation in
                inches: {{ $weatherMarineItem->day()->getTotalPrecipitationInInches() }}</li>
            <li>Average visibility in kilometers: {{ $weatherMarineItem->day()->getAvgVisibilityInKm() }}</li>
            <li>Average visibility in miles: {{ $weatherMarineItem->day()->getAvgVisibilityInMiles() }}</li>
            <li>Average humidity as percentage: {{ $weatherMarineItem->day()->getAvgHumidity() }}</li>
            <li>UV Index: {{ $weatherMarineItem->day()->getUVIndex() }}</li>

            @if(!is_null($weatherMarineItem->day()->getWeatherCondition()))
                <x-weather-condition :weatherCondition='$weatherMarineItem->day()->getWeatherCondition()'/>
            @endif
        @endif

        @if(!is_null($weatherMarineItem->astro()) && !is_null($weatherMarineItem->astro()->getCommonAstronomyParams()))
            <x-weather-astronomy :weatherAstro='$weatherMarineItem->astro()->getCommonAstronomyParams()'/>
        @endif

        @foreach($weatherMarineItem->hour() as $forecastMarineHour)
            @if(is_null($forecastMarineHour))
                <li>No weather forecast data per hour available</li>
            @endif

            <li>Timestamp: {{ $forecastMarineHour->getTimestamp() }}</li>
            <li>Date and time: {{ $forecastMarineHour->getDateTime() }}</li>
            <li>Temperature in Celsius: {{ $forecastMarineHour->getActualCelsius() }}</li>
            <li>Temperature in Fahrenheit: {{ $forecastMarineHour->getActualFahrenheit() }}</li>

            @if(!is_null($forecastMarineHour->getWeatherCondition()))
                <x-weather-condition :weatherCondition='$forecastMarineHour->getWeatherCondition()'/>
            @endif

            <li>Maximum wind speed in miles per hour: {{ $forecastMarineHour->getWindSpeedInMiles() }}</li>
            <li>Maximum wind speed in kilometers per hour: {{ $forecastMarineHour->getWindSpeedInKm() }}</li>
            <li>Wind direction in degrees: {{ $forecastMarineHour->getWindDirectionInDegrees() }}</li>
            <li>Wind direction as 16 point compass. e.g.:
                NSW: {{ $forecastMarineHour->getWindDirectionInPoints() }}</li>
            <li>Pressure in millibars: {{ $forecastMarineHour->getPressureInMillibars() }}</li>
            <li>Pressure in inches: {{ $forecastMarineHour->getPressureInInches() }}</li>
            <li>Precipitation amount in millimeters: {{ $forecastMarineHour->getPrecipitationInMm() }}</li>
            <li>Precipitation amount in inches: {{ $forecastMarineHour->getPrecipitationInInches() }}</li>
            <li>Humidity as percentage: {{ $forecastMarineHour->getHumidity() }}</li>
            <li>Cloud cover as percentage: {{ $forecastMarineHour->getCloudCover() }}</li>
            <li>Feels like temperature as Celsius: {{ $forecastMarineHour->getFeelsLikeCelsius() }}</li>
            <li>Feels like temperature as Fahrenheit: {{ $forecastMarineHour->getFeelsLikeFahrenheit() }}</li>
            <li>Windchill temperature in Celsius: {{ $forecastMarineHour->getWindchillInCelsius() }}</li>
            <li>Windchill temperature in Fahrenheit: {{ $forecastMarineHour->getWindchillInFahrenheit() }}</li>
            <li>Heat index in Celsius: {{ $forecastMarineHour->getHeatIndexInCelsius() }}</li>
            <li>Heat index in Fahrenheit: {{ $forecastMarineHour->getHeatIndexInFahrenheit() }}</li>
            <li>Dew point in Celsius: {{ $forecastMarineHour->getDewPointInCelsius() }}</li>
            <li>Dew point in Fahrenheit: {{ $forecastMarineHour->getDewPointInFahrenheit() }}</li>
            <li>Will it rain?: {{ $forecastMarineHour->shallItRain() === 1 ? 'yes' : 'no' }}</li>
            <li>Will it snow?: {{ $forecastMarineHour->shallItSnow() === 1 ? 'yes' : 'no' }}</li>
            <li>Is it day?: {{ $forecastMarineHour->getDayNightConditionIcon() === 1 ? 'yes' : 'no' }}</li>
            <li>Visibility in kilometers: {{ $forecastMarineHour->getVisibilityInKm() }}</li>
            <li>Visibility in miles: {{ $forecastMarineHour->getVisibilityInMiles() }}</li>
            <li>Chance of rain as percentage: {{ $forecastMarineHour->getRainChance() }}</li>
            <li>Chance of snow as percentage: {{ $forecastMarineHour->getSnowChance() }}</li>
            <li>Wind gust in miles per hour: {{ $forecastMarineHour->getWindGustInMiles() }}</li>
            <li>Wind gust in kilometers per hour: {{ $forecastMarineHour->getWindGustInKm() }}</li>
            <li>UV Index: {{ $forecastMarineHour->getUVIndex() }}</li>
        @endforeach

        @foreach($weatherMarineItem->tides() as $forecastMarineTides)
            @if(is_null($forecastMarineTides))
                <li>No marine tides data available</li>
            @endif

            <li>Local tide time: {{ $forecastMarineTides->getLocalTideTime() }}</li>
            <li>Tide height in mt: {{ $forecastMarineTides->getTideHeight() }}</li>
            <li>Tide type (high/low): {{ $forecastMarineTides->getTideType() }}</li>
        @endforeach
    </ul>
@endforeach


