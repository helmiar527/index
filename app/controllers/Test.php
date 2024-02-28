<?php

class Test extends Controller
{
  public function index()
  {
$apiKey = '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';
$url = 'https://api.brevo.com/v3/emailCampaigns';

$data = '{
    "name": "Campaign sent via the API",
    "subject": "My subject",
    "sender": { "name": "From kuyang", "email": "noreplay@helmiar527.my.id" },
    "to": { "email":"topupfreefire527@gmail.com", "name" : "John Doe" },
    "type": "classic",
    "htmlContent": "Congratulations! You successfully sent this example campaign via the Brevo API.",
    "recipients": { "listIds": [2,7] },
    "scheduledAt": date("Y-m-d h:m:s")
}';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('api-key: ' . $apiKey));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

  }
}
