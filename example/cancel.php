<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Shibanashiqc\DtdcCourierPhpSdk\DTDC;

$client = new DTDC('',  '', false);
$client->setCustomerCode('');

$response = $client->base->cancelShipment([
    "D78326386"
]);

echo json_encode($response);