<h4>Sports Data</h4>

@foreach($weatherSports as $weatherSportsType => $weatherSportsItem)
    @if(!$weatherSportsItem->isEmpty())
        <strong>{{ ucfirst($weatherSportsType) }}</strong>

        @foreach($weatherSportsItem as $weatherSportsItemDetails)
            <ul>
                <li>Stadium: {{ $weatherSportsItemDetails->getStadium() }}</li>
                <li>Country: {{ $weatherSportsItemDetails->getCountry() }}</li>
                <li>Region: {{ $weatherSportsItemDetails->getRegion() }}</li>
                <li>Tournament: {{ $weatherSportsItemDetails->getTournament() }}</li>
                <li>Match: {{ $weatherSportsItemDetails->getMatch() }}</li>
                <li>Start local date and time for the event: {{ $weatherSportsItemDetails->getStartDateTime() }}</li>
            </ul>
        @endforeach
    @endif
@endforeach


