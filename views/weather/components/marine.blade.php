<h4>Weather Marine Forecast</h4>

@foreach($weatherMarine as $weatherMarineItem)
    <ul>
        <h4>{{ $weatherMarineItem->common()->getDate() }}</h4>

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
            <h4>{{ $forecastMarineHour->getCommonForecastHourParams()->getDateTime() }}</h4>

            <li>Timestamp: {{ $forecastMarineHour->getCommonForecastHourParams()->getTimestamp() }}</li>
            <li>Date and time: {{ $forecastMarineHour->getCommonForecastHourParams()->getDateTime() }}</li>
            <li>Temperature in
                Celsius: {{ $forecastMarineHour->getCommonForecastHourParams()->getActualCelsius() }}</li>
            <li>Temperature in
                Fahrenheit: {{ $forecastMarineHour->getCommonForecastHourParams()->getActualFahrenheit() }}</li>
            <li>Maximum wind speed in miles per
                hour: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindSpeedInMiles() }}</li>
            <li>Maximum wind speed in kilometers per
                hour: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindSpeedInKm() }}</li>
            <li>Wind direction in
                degrees: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindDirectionInDegrees() }}</li>
            <li>Wind direction as 16 point compass. e.g.:
                NSW: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindDirectionInPoints() }}</li>
            <li>Pressure in
                millibars: {{ $forecastMarineHour->getCommonForecastHourParams()->getPressureInMillibars() }}</li>
            <li>Pressure in inches: {{ $forecastMarineHour->getCommonForecastHourParams()->getPressureInInches() }}</li>
            <li>Precipitation amount in
                millimeters: {{ $forecastMarineHour->getCommonForecastHourParams()->getPrecipitationInMm() }}</li>
            <li>Precipitation amount in
                inches: {{ $forecastMarineHour->getCommonForecastHourParams()->getPrecipitationInInches() }}</li>
            <li>Humidity as percentage: {{ $forecastMarineHour->getCommonForecastHourParams()->getHumidity() }}</li>
            <li>Cloud cover as
                percentage: {{ $forecastMarineHour->getCommonForecastHourParams()->getCloudCover() }}</li>
            <li>Feels like temperature as
                Celsius: {{ $forecastMarineHour->getCommonForecastHourParams()->getFeelsLikeCelsius() }}</li>
            <li>Feels like temperature as
                Fahrenheit: {{ $forecastMarineHour->getCommonForecastHourParams()->getFeelsLikeFahrenheit() }}</li>
            <li>Windchill temperature in
                Celsius: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindchillInCelsius() }}</li>
            <li>Windchill temperature in
                Fahrenheit: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindchillInFahrenheit() }}</li>
            <li>Heat index in
                Celsius: {{ $forecastMarineHour->getCommonForecastHourParams()->getHeatIndexInCelsius() }}</li>
            <li>Heat index in
                Fahrenheit: {{ $forecastMarineHour->getCommonForecastHourParams()->getHeatIndexInFahrenheit() }}</li>
            <li>Dew point in
                Celsius: {{ $forecastMarineHour->getCommonForecastHourParams()->getDewPointInCelsius() }}</li>
            <li>Dew point in
                Fahrenheit: {{ $forecastMarineHour->getCommonForecastHourParams()->getDewPointInFahrenheit() }}</li>
            <li>Will it
                rain?: {{ $forecastMarineHour->getCommonForecastHourParams()->shallItRain() === 1 ? 'yes' : 'no' }}</li>
            <li>Will it
                snow?: {{ $forecastMarineHour->getCommonForecastHourParams()->shallItSnow() === 1 ? 'yes' : 'no' }}</li>
            <li>Is it
                day?: {{ $forecastMarineHour->getCommonForecastHourParams()->getDayNightConditionIcon() === 1 ? 'yes' : 'no' }}</li>
            <li>Visibility in
                kilometers: {{ $forecastMarineHour->getCommonForecastHourParams()->getVisibilityInKm() }}</li>
            <li>Visibility in
                miles: {{ $forecastMarineHour->getCommonForecastHourParams()->getVisibilityInMiles() }}</li>
            <li>Chance of rain as
                percentage: {{ $forecastMarineHour->getCommonForecastHourParams()->getRainChance() }}</li>
            <li>Chance of snow as
                percentage: {{ $forecastMarineHour->getCommonForecastHourParams()->getSnowChance() }}</li>
            <li>Wind gust in miles per
                hour: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindGustInMiles() }}</li>
            <li>Wind gust in kilometers per
                hour: {{ $forecastMarineHour->getCommonForecastHourParams()->getWindGustInKm() }}</li>
            <li>UV Index: {{ $forecastMarineHour->getCommonForecastHourParams()->getUVIndex() }}</li>
            <li>Significant wave height in metres: {{ $forecastMarineHour->getSignificantWaveHeight() }}</li>
            <li>Swell wave height in metres: {{ $forecastMarineHour->getSwellWaveHeightInMetres() }}</li>
            <li>Swell wave height in feet: {{ $forecastMarineHour->getSwellWaveHeightInFeet() }}</li>
            <li>Swell direction in degrees: {{ $forecastMarineHour->getSwellDirection() }}</li>
            <li>Swell direction in 16 point compass: {{ $forecastMarineHour->getSwellDirectionInPoints() }}</li>
            <li>Swell period in seconds: {{ $forecastMarineHour->getSwellPeriod() }}</li>
            <li>Water temperature in Celsius: {{ $forecastMarineHour->getWaterTemperatureInCelsius() }}</li>
            <li>Water temperature in Fahrenheit: {{ $forecastMarineHour->getWaterTemperatureInFahrenheit() }}</li>

            @if(!is_null($forecastMarineHour->getCommonForecastHourParams()->getWeatherCondition()))
                <x-weather-condition
                        :weatherCondition='$forecastMarineHour->getCommonForecastHourParams()->getWeatherCondition()'/>
            @endif
        @endforeach

        @foreach($weatherMarineItem->tides() as $forecastMarineTides)
            <h4>Tides Data by {{ $forecastMarineTides->getLocalTideTime() }}</h4>

            <li>Local tide time: {{ $forecastMarineTides->getLocalTideTime() }}</li>
            <li>Tide height in mt: {{ $forecastMarineTides->getTideHeight() }}</li>
            <li>Tide type (high/low): {{ $forecastMarineTides->getTideType() }}</li>
        @endforeach
    </ul>
@endforeach


