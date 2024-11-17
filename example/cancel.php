<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Shibanashiqc\DtdcCourierPhpSdk\DTDC;

$client = new DTDC('', x_access_token: '');
$client->setCustomerCode('');

$response = $client->base->cancelShipment([
    "D78326386"
]);

echo json_encode($response);