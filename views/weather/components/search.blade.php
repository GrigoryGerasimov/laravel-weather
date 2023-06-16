@foreach($weatherSearch as $weatherSearchItem)
    @if(is_null($weatherSearchItem))
        <li>No weather search data available</li>
    @endif

    <ul>
        <li>ID: {{ $weatherSearchItem->getId() }}</li>
        <li>URL: {{ $weatherSearchItem->getUrl() }}</li>
        <li>Searched location: {{ $weatherSearchItem->getCity() }}</li>
        <li>Region/state: {{ $weatherSearchItem->getRegion() }}</li>
        <li>Country: {{ $weatherSearchItem->getCountry() }}</li>
        <li>Latitude in decimal degree: {{ $weatherSearchItem->getLatitude() }}</li>
        <li>Longitude in decimal degree: {{ $weatherSearchItem->getLongitude() }}</li>
    </ul>
@endforeach


