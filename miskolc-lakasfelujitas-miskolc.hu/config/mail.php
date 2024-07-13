<?php
// SMTP2GO API kulcs
$apiKey = 'api-5DAD36821BAE4DEA9EC0B2AE7C8E98E2';

// Első e-mail küldése
$toInfo = 'info@karpittisztitas-miskolc.hu';
$subjectInfo = 'Árajánlatkérés érkezett '.$offerid.' ('.$_SERVER['SERVER_NAME'].')';
$messageInfo = '<h1>teszt</h1>';

$data = [
    "sender" => "info@karpittisztitas-miskolc.hu",
    "to" => [$toInfo],
    "subject" => $subjectInfo,
    "html_body" => $messageInfo
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.smtp2go.com/v3/email/send');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-Smtp2go-Api-Key: ' . $apiKey,
    'accept: application/json'
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Message has been sent';
}

curl_close($ch);

// Második e-mail küldése az ügyfélnek
$toCustomer = $_POST['email'];
$subjectCustomer = 'Árajánlatkérését megkaptuk ('.$offerid.')';
$messageCustomer = '<h1>Ügyfél</h1>';

$data = [
    "sender" => "info@karpittisztitas-miskolc.hu",
    "to" => [$toCustomer],
    "subject" => $subjectCustomer,
    "html_body" => $messageCustomer
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.smtp2go.com/v3/email/send');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-Smtp2go-Api-Key: ' . $apiKey,
    'accept: application/json'
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Customer message has been sent';
}

curl_close($ch);
?>
