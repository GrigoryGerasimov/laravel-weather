<ul>
    <li>Last updated: {{ $weatherCurrent->getLastUpdated() }}</li>
    <li>Last updated timestamp: {{ $weatherCurrent->getLastUpdatedTimestamp() }}</li>
    <li>Actual Celsius: {{ $weatherCurrent->getActualCelsius() }}</li>
    <li>Feels-like Celsius: {{ $weatherCurrent->getFeelsLikeCelsius() }}</li>
    <li>Actual Fahrenheit: {{ $weatherCurrent->getActualFahrenheit() }}</li>
    <li>Feels-like Fahrenheit: {{ $weatherCurrent->getFeelsLikeFahrenheit() }}</li>
    <li>Weather condition text: {{ $weatherCurrent->getWeatherCondition()->getText() }}</li>
    <li>Weather condition icon url: {{ $weatherCurrent->getWeatherCondition()->getIconUrl() }}</li>
    <li>Weather condition code: {{ $weatherCurrent->getWeatherCondition()->getCode() }}</li>
    <li>Wind speed in miles: {{ $weatherCurrent->getWindSpeedInMiles() }}</li>
    <li>Wind direction in degrees: {{ $weatherCurrent->getWindDirectionInDegrees() }}</li>
    <li>Wind direction in points: {{ $weatherCurrent->getWindDirectionInPoints() }}</li>
    <li>Wind gust in miles: {{ $weatherCurrent->getWindGustInMiles() }}</li>
    <li>Wind gust in kilometres{{ $weatherCurrent->getWindGustInKm() }}</li>
    <li>Pressure in millibars: {{ $weatherCurrent->getPressureInMillibars() }}</li>
    <li>Pressure in inches: {{ $weatherCurrent->getPressureInInches() }}</li>
    <li>Precipitation in millimetres: {{ $weatherCurrent->getPrecipitationInMm() }}</li>
    <li>Precipitation in inches: {{ $weatherCurrent->getPrecipitationInInches() }}</li>
    <li>Humidity: {{ $weatherCurrent->getHumidity() }}</li>
    <li>Cloud Coverage: {{ $weatherCurrent->getCloudCover() }}</li>
    <li>UV Index: {{ $weatherCurrent->getUVIndex() }}</li>
</ul>