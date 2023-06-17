<strong>Location</strong>

<ul>
    <li>Location city: {{ $weatherLocation->getCity() }}</li>
    <li>Region/state: {{ $weatherLocation->getRegion() }}</li>
    <li>Location country: {{ $weatherLocation->getCountry() }}</li>
    <li>Latitude in decimal degree: {{ $weatherLocation->getLatitude() }}</li>
    <li>Longitude in decimal degree: {{ $weatherLocation->getLongitude() }}</li>

    @if(!is_null($weatherLocation->getCommonTimezoneParams()))
        <x-weather-timezone :weatherTimezone='$weatherLocation->getCommonTimezoneParams()' />
    @endif
</ul>
