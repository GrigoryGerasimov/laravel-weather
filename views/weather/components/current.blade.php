@if(!is_null($weatherCurrentLocation))
    <x-location :weatherLocation='$weatherCurrentLocation'/>
@endif

<ul>
    <li>
        <strong>Current Weather Forecast</strong>
    </li>
    <li>Last updated: {{ $weatherCurrent->getLastUpdated() }}</li>
    <li>Last updated timestamp: {{ $weatherCurrent->getLastUpdatedTimestamp() }}</li>
    <li>Temperature in Celsius: {{ $weatherCurrent->getActualCelsius() }}</li>
    <li>Feels like temperature in Celsius: {{ $weatherCurrent->getFeelsLikeCelsius() }}</li>
    <li>Temperature in Fahrenheit: {{ $weatherCurrent->getActualFahrenheit() }}</li>
    <li>Feels like temperature in Fahrenheit: {{ $weatherCurrent->getFeelsLikeFahrenheit() }}</li>

    @if(!is_null($weatherCurrent->getWeatherCondition()))
        @include('vendor.laravel-weather.layouts.weathercondition', ['weatherCondition' => $weatherCurrent->getWeatherCondition()])
    @endif

    <li>Wind speed in miles per hour: {{ $weatherCurrent->getWindSpeedInMiles() }}</li>
    <li>Wind speed in kilometers per hour: {{ $weatherCurrent->getWindSpeedInKm() }}</li>
    <li>Wind direction in degrees: {{ $weatherCurrent->getWindDirectionInDegrees() }}</li>
    <li>Wind direction as 16 point compass. e.g.: NSW: {{ $weatherCurrent->getWindDirectionInPoints() }}</li>
    <li>Wind gust in miles per hour: {{ $weatherCurrent->getWindGustInMiles() }}</li>
    <li>Wind gust in kilometers per hour: {{ $weatherCurrent->getWindGustInKm() }}</li>
    <li>Pressure in millibars: {{ $weatherCurrent->getPressureInMillibars() }}</li>
    <li>Pressure in inches: {{ $weatherCurrent->getPressureInInches() }}</li>
    <li>Precipitation amount in millimeters: {{ $weatherCurrent->getPrecipitationInMm() }}</li>
    <li>Precipitation amount in inches: {{ $weatherCurrent->getPrecipitationInInches() }}</li>
    <li>Humidity as percentage: {{ $weatherCurrent->getHumidity() }}</li>
    <li>Cloud cover as percentage: {{ $weatherCurrent->getCloudCover() }}</li>
    <li>UV Index: {{ $weatherCurrent->getUVIndex() }}</li>

    @if(!is_null($weatherCurrentAQI))
        @include('vendor.laravel-weather.layouts.airquality', ['weatherAQI' => $weatherCurrentAQI])
    @endif
</ul>