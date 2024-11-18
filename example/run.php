<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Shibanashiqc\DtdcCourierPhpSdk\DTDC;
use Shibanashiqc\DtdcCourierPhpSdk\Config;

$client = new DTDC('your_api_key', 'your_access_token', false);
$client->setCustomerCode('customer_code');

Config::setShippingInfo([
    'customer_code' => $client::$customer_code,
    'service_type_id' => 'B2C PRIORITY',
    'load_type' => 'NON-DOCUMENT',
    'description' => 'Caddy DM48 Office Chair (Black)',
    'dimension_unit' => 'cm',
    'length' => '70.0',
    'width' => '70.0',
    'height' => '65.0',
    'weight_unit' => 'kg',
    'weight' => '17.0',
    'declared_value' => '5982.6',
    'num_pieces' => '1',
    'customer_reference_number' => '202424-135028',
    'cod_collection_mode' => '',
    'cod_amount' => '0',
    'commodity_id' => '99',
    'reference_number' => '',
]);

Config::setOriginDetails('TEST', '7894561230', '8766747774', '3/658  pillayar nagar karattur Amani kondalampatti', '', '676552', 'SALEM', 'Tamil Nadu');
Config::setDestinationDetails('TEST', '7844561230', '', '3/658  pillayar nagar karattur Amani kondalampatti', '', '636010', 'SALEM', 'Tamil Nadu');

Config::addPieceDetail([
    [
        'description' => 'Test Product',
        'declared_value' => '200',
        'weight' => '0.5',
        'height' => '5',
        'length' => '5',
        'width' => '5'
    ],
    // next piece detail can be added here
]);
    

$response = $client->base->getPincodeInfo('676552', '600040');
print_r($response);


$config = Config::$config;
$response = $client->base->createNewShipment($config);
print_r($response);

$response = $client->base->getShippingLabel('7X6548766');
print_r($response);

$response = $client->base->getTrackingStatus('7X6548766');
print_r($response);

// type of zone : City, Region, Zone, Metro, Rol-A
$response = $client->base->shippingAmount(50, 'City');
print_r($response);

$response = $client->base->shippingCost(50, '676552', '673122', 'south');
print_r($response);