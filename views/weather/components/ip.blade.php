<ul>
    <li>IP address: {{ $weatherIpLookup->getIp() }}</li>
    <li>IP type (ipv4 or ipv6): {{ $weatherIpLookup->getIpType() }}</li>
    <li>Continent code: {{ $weatherIpLookup->getContinentCode() }}</li>
    <li>Continent name: {{ $weatherIpLookup->getContinent() }}</li>
    <li>Country code: {{ $weatherIpLookup->getCountryCode() }}</li>
    <li>Name of country: {{ $weatherIpLookup->getCountry() }}</li>
    <li>Is in EU?: {{ $weatherIpLookup->isInEU() ? 'yes' : 'no' }}</li>
    <li>Geoname ID: {{ $weatherIpLookup->getGeonameID() }}</li>
    <li>City name: {{ $weatherIpLookup->getCity() }}</li>
    <li>Region name: {{ $weatherIpLookup->getRegion() }}</li>
    <li>Latitude in decimal degree: {{ $weatherIpLookup->getLatitude() }}</li>
    <li>Longitude in decimal degree: {{ $weatherIpLookup->getLongitude() }}</li>

    @if(!is_null($weatherIpLookup->getCommonTimezoneParams()))
        <li>Time zone id: {{ $weatherIpLookup->getCommonTimezoneParams()->getTimezoneName() }}</li>
        <li>Local time as timestamp: {{ $weatherIpLookup->getCommonTimezoneParams()->getTimestamp() }}</li>
        <li>Local time in yyyy-MM-dd HH:mm format: {{ $weatherIpLookup->getCommonTimezoneParams()->getDateTime() }}</li>
    @endif
</ul>

