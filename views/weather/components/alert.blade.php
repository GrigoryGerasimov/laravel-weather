<h4>Alerts</h4>

@foreach($weatherAlert as $alertItem)
    <ul>
        <li>Alert headline: {{ $weatherAlert->getHeadline() }}</li>
        <li>Alert type: {{ $weatherAlert->getAlertType() }}</li>
        <li>Alert severity: {{ $weatherAlert->getSeverity() }}</li>
        <li>Urgency: {{ $weatherAlert->getUrgency() }}</li>
        <li>Areas covered: {{ $weatherAlert->getAreas() }}</li>
        <li>Category: {{ $weatherAlert->getCategory() }}</li>
        <li>Certainty: {{ $weatherAlert->getCertainty() }}</li>
        <li>Event: {{ $weatherAlert->getEvent() }}</li>
        <li>Note: {{ $weatherAlert->getNote() }}</li>
        <li>Effective: {{ $weatherAlert->getEffective() }}</li>
        <li>Expires: {{ $weatherAlert->getExpires() }}</li>
        <li>Description: {{ $weatherAlert->getDescription() }}</li>
        <li>Instruction: {{ $weatherAlert->getInstruction() }}</li>
    </ul>
@endforeach