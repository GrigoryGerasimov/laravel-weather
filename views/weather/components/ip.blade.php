<ul>
    <li>IP address: {{ $weatherIpLookup->getIp() }}</li>
    <li>IP type (ipv4 or ipv6): {{ $weatherIpLookup->getIpType() }}</li>
    <li>Continent code: {{ $weatherIpLookup->getContinentCode() }}</li>
    <li>Continent name: {{ $weatherIpLookup->getContinent() }}</li>
    <li>Country code: {{ $weatherIpLookup->getCountryCode() }}</li>
    <li>Country name: {{ $weatherIpLookup->getCountry() }}</li>
    <li>Is in EU?: {{ $weatherIpLookup->isInEU() ? 'yes' : 'no' }}</li>
    <li>Geoname ID: {{ $weatherIpLookup->getGeonameID() }}</li>
    <li>City: {{ $weatherIpLookup->getCity() }}</li>
    <li>Region: {{ $weatherIpLookup->getRegion() }}</li>
    <li>Latitude in decimal degree: {{ $weatherIpLookup->getLatitude() }}</li>
    <li>Longitude in decimal degree: {{ $weatherIpLookup->getLongitude() }}</li>

    @if(!is_null($weatherIpLookup->getCommonTimezoneParams()))
        <x-timezone :weatherTimezone='$weatherIpLookup->getCommonTimezoneParams()' />
    @endif
</ul>

