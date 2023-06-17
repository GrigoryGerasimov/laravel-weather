<h4>Timezone</h4>

<ul>
    <li>Time zone name: {{ $weatherTimezone->getTimezoneName() }}</li>
    <li>Local date and time as timestamp: {{ $weatherTimezone->getTimestamp() }}</li>
    <li>Local date and time: {{ $weatherTimezone->getDateTime() }}</li>
</ul>
