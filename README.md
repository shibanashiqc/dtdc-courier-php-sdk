# dtdc-courier-php-sdk

Unofficial PHP library for [DTDC](https://www.dtdc.in/integrated-e-commerce-logistics.asp).

### Prerequisites
- A minimum of PHP 8.0 is required.


## Installation

-   If your project using composer, run the below command

```
composer require shibanashiqc/dtdc-courier-php-sdk
```

- If you are not using composer, download the latest release from [the releases section](https://github.com/shibanashiqc/dtdc-courier-php-sdk/releases).
    **You should download the `dtdc-courier-php-sdk.zip` file**.
    After that, include `DTDC.php` in your application and you can use the API as usual.

##Note:
This PHP library follows the following practices:

- Namespaced under `Shibanashiqc\DtdcCourierPhpSdk\`
- API throws exceptions instead of returning errors
- Options are passed as an array instead of multiple arguments wherever possible
- All requests and responses are communicated over JSON

## Documentation

For Documentation of DTDC API you need contact DTDC Team

## Basic Usage

Api Key , x_access_token and customer code credentials can be obtained from the DTDC.

Required parameters for the constructor are:
api-key, x_access_token, customer_code

```php
use Shibanashiqc\DtdcCourierPhpSdk\DTDC;
use Shibanashiqc\DtdcCourierPhpSdk\Config;

$client = new DTDC('your_api_key', 'your_access_token');
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
    


$config = Config::$config;
$response = $client->base->createNewShipment($config);
print_r($response);

$response = $client->base->getShippingLabel('7X6548766');
print_r($response);

$response = $client->base->getTrackingStatus('7X6548766');
print_r($response);


```

### createNewShipment
```php
$config = Config::$config;
$response = $client->base->createNewShipment($config);
print_r($response);
```

### getShippingLabel
```php
$response = $client->base->getShippingLabel('7X6548766');
print_r($response);
```

### getTrackingStatus
```php
$response = $client->base->getTrackingStatus('7X6548766');
print_r($response);
```

## License

The DTDC PHP SDK is released under the MIT License. See [LICENSE](LICENSE) file for more details.
