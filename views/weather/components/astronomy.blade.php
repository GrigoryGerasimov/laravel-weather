<strong>Astronomy Data</strong>

<ul>
    <li>Sunrise time: {{ $weatherAstro->getSunriseTime() }}</li>
    <li>Sunset time: {{ $weatherAstro->getSunsetTime() }}</li>
    <li>Moonrise time: {{ $weatherAstro->getMoonriseTime() }}</li>
    <li>Moonset time: {{ $weatherAstro->getMoonsetTime() }}</li>
    <li>Moon phase: {{ $weatherAstro->getMoonPhase() }}</li>
    <li>Moon illumination as %: {{ $weatherAstro->getMoonIllumination() }}</li>
    <li>Is moon up?: {{ $weatherAstro->isMoonUp() ? 'yes' : 'no' }}</li>
    <li>Is sun up?: {{ $weatherAstro->isSunUp() ? 'yes' : 'no' }}</li>
</ul>
