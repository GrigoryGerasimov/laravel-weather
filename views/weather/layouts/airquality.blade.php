<ul>
    <li>Carbon Monoxide
        (μg/m3): {{ $weatherAQI->getCarbonMonoxide() }}</li>
    <li>Ozone (μg/m3): {{ $weatherAQI->getOzone() }}</li>
    <li>Nitrogen dioxide
        (μg/m3): {{ $weatherAQI->getNitrogenDioxide() }}</li>
    <li>Sulphur dioxide
        (μg/m3): {{ $weatherAQI->getSulphurDioxide() }}</li>
    <li>PM2.5 (μg/m3): {{ $weatherAQI->getPM2_5() }}</li>
    <li>PM10 (μg/m3): {{ $weatherAQI->getPM10() }}</li>
    <li>US - EPA standard: {{ $weatherAQI->getUSEPAStandard() }}</li>
    <li>UK Defra Index: {{ $weatherAQI->getUKDefraIndex() }}</li>
</ul>