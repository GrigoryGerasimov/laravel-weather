@if(!is_null($weatherTimezoneLocation))
    <x-location :weatherLocation='$weatherTimezoneLocation'/>
@endif

<ul>
    <li>
        <strong>Timezone</strong>
    </li>
    <li>Time zone name: {{ $weatherTimezone->getTimezoneName() }}</li>
    <li>Local date and time as timestamp: {{ $weatherTimezone->getTimestamp() }}</li>
    <li>Local date and time: {{ $weatherTimezone->getDateTime() }}</li>
</ul>
