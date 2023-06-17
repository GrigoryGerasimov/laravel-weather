<h4>Search Data</h4>

@foreach($weatherSearch as $weatherSearchItem)
    <ul>
        <li>ID: {{ $weatherSearchItem->getId() }}</li>
        <li>Url: {{ $weatherSearchItem->getUrl() }}</li>
        <li>Searched location: {{ $weatherSearchItem->getCity() }}</li>
        <li>Region/state: {{ $weatherSearchItem->getRegion() }}</li>
        <li>Country: {{ $weatherSearchItem->getCountry() }}</li>
        <li>Latitude in decimal degree: {{ $weatherSearchItem->getLatitude() }}</li>
        <li>Longitude in decimal degree: {{ $weatherSearchItem->getLongitude() }}</li>
    </ul>
@endforeach


