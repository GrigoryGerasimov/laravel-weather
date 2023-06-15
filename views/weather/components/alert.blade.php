@foreach($weatherAlert as $alertItem)
    <ul>
        <li>Alert headline: {{ $weatherAlert->getHeadline() }}</li>
        <li>Type of alert: {{ $weatherAlert->getAlertType() }}</li>
        <li>Severity of alert: {{ $weatherAlert->getSeverity() }}</li>
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