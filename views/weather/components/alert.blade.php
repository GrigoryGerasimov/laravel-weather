<h4>Alerts</h4>

@foreach($weatherAlert as $weatherAlertItem)
    <ul>
        <li>Alert headline: {{ $weatherAlertItem->getHeadline() }}</li>
        <li>Alert type: {{ $weatherAlertItem->getAlertType() }}</li>
        <li>Alert severity: {{ $weatherAlertItem->getSeverity() }}</li>
        <li>Urgency: {{ $weatherAlertItem->getUrgency() }}</li>
        <li>Areas covered: {{ $weatherAlertItem->getAreas() }}</li>
        <li>Category: {{ $weatherAlertItem->getCategory() }}</li>
        <li>Certainty: {{ $weatherAlertItem->getCertainty() }}</li>
        <li>Event: {{ $weatherAlertItem->getEvent() }}</li>
        <li>Note: {{ $weatherAlertItem->getNote() }}</li>
        <li>Effective: {{ date('Y-m-d H:i:s', strtotime($weatherAlertItem->getEffective())) }}</li>
        <li>Expires: {{ date('Y-m-d H:i:s', strtotime($weatherAlertItem->getExpires())) }}</li>
        <li>Description: {{ $weatherAlertItem->getDescription() }}</li>
        <li>Instruction: {{ $weatherAlertItem->getInstruction() }}</li>
    </ul>
@endforeach