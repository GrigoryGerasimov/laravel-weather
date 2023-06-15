<ul>
    <li>Location city name: {{ $weatherLocation->getCity() }}</li>
    <li>Region or state of the location: {{ $weatherLocation->getRegion() }}</li>
    <li>Location country name: {{ $weatherLocation->getCountry() }}</li>
    <li>Latitude in decimal degree: {{ $weatherLocation->getLatitude() }}</li>
    <li>Longitude in decimal degree: {{ $weatherLocation->getLongitude() }}</li>

    @if(!is_null($weatherLocation->getCommonTimezoneParams()))
        <li>Time zone name: {{ $weatherLocation->getCommonTimezoneParams()->getTimezoneName() }}</li>
        <li>Local date and time as timestamp: {{ $weatherLocation->getCommonTimezoneParams()->getTimestamp() }}</li>
        <li>Local date and time: {{ $weatherLocation->getCommonTimezoneParams()->getDateTime() }}</li>
    @endif
</ul>
