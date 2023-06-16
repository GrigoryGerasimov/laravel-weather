<strong>Sports Data</strong>

@foreach($weatherSports as $weatherSportsItem)
    @if(is_null($weatherSportsItem))
        <li>No sports data available</li>
    @endif

    <ul>
        <li>Stadium: {{ $weatherSportsItem->getStadium() }}</li>
        <li>Country: {{ $weatherSportsItem->getCountry() }}</li>
        <li>Region: {{ $weatherSportsItem->getRegion() }}</li>
        <li>Tournament: {{ $weatherSportsItem->getTournament() }}</li>
        <li>Match: {{ $weatherSportsItem->getMatch() }}</li>
        <li>Start local date and time for the event: {{ $weatherSportsItem->getStartDateTime() }}</li>
    </ul>
@endforeach

