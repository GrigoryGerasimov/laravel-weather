<h4>Weather Condition</h4>

<ul>
    <li>Weather condition text: {{ $weatherCondition->getText() }}</li>
    <li>Weather condition icon:
        <img src='{{ $weatherCondition->getIconUrl() }}'
             alt='weather-icon'/>
    </li>
    <li>Weather condition icon
        url: {{ $weatherCondition->getIconUrl() }}</li>
    <li>Weather condition code: {{ $weatherCondition->getCode() }}</li>
</ul>
