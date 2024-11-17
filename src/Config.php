<?php 

namespace Shibanashiqc\DtdcCourierPhpSdk;

class ConfigException extends \Exception {}

class Config {
    public static array $config = [
        'consignments' => [
            [
                'customer_code' => '',
                'service_type_id' => 'B2C PRIORITY',
                'load_type' => 'NON-DOCUMENT',
                'description' => '',
                'dimension_unit' => 'cm',
                'length' => '',
                'width' => '',
                'height' => '',
                'weight_unit' => 'kg',
                'weight' => '',
                'declared_value' => '',
                'num_pieces' => '0',
                'origin_details' => [
                    'name' => '',
                    'phone' => '',
                    'alternate_phone' => '',
                    'address_line_1' => '',
                    'address_line_2' => '',
                    'pincode' => '',
                    'city' => '',
                    'state' => ''
                ],
                'destination_details' => [
                    'name' => '',
                    'phone' => '',
                    'alternate_phone' => '',
                    'address_line_1' => '',
                    'address_line_2' => '',
                    'pincode' => '',
                    'city' => '',
                    'state' => ''
                ],
                'pieces_detail' => []
            ]
        ],
    ];

    private static function validateFields(array $data, array $requiredFields, string $context): void {
        $missingFields = array_diff($requiredFields, array_keys($data));
        if (!empty($missingFields)) {
            throw new ConfigException("Missing required fields in $context: " . implode(', ', $missingFields));
        }
    }

    public static function setShippingInfo(array $info): void {
        try {
            $requiredFields = [
                'customer_code', 'service_type_id', 'load_type', 'description', 
                'dimension_unit', 'length', 'width', 'height', 'weight_unit', 
                'weight', 'declared_value', 'num_pieces', 'customer_reference_number', 'commodity_id', 'reference_number'
            ];

            self::validateFields($info, $requiredFields, 'shipping info');
            self::$config['consignments'][0] = $info;
        } catch (ConfigException $e) {
            // Display only the error message
            echo $e->getMessage();
        }
    }

    public static function setOriginDetails($name, $phone, $alternate_phone, $address_line_1, $address_line_2, $pincode, $city, $state): void {
        
        try {
            self::$config['consignments'][0]['origin_details'] = [
                'name' => $name,
                'phone' => $phone,
                'alternate_phone' => $alternate_phone,
                'address_line_1' => $address_line_1,
                'address_line_2' => $address_line_2,
                'pincode' => $pincode,
                'city' => $city,
                'state' => $state
            ];
        } catch (ConfigException $e) {
            echo $e->getMessage();
        }
    }

    public static function setDestinationDetails($name, $phone, $alternate_phone, $address_line_1, $address_line_2, $pincode, $city, $state): void {
        try {
            self::$config['consignments'][0]['destination_details'] = [
                'name' => $name,
                'phone' => $phone,
                'alternate_phone' => $alternate_phone,
                'address_line_1' => $address_line_1,
                'address_line_2' => $address_line_2,
                'pincode' => $pincode,
                'city' => $city,
                'state' => $state,
            ];
        } catch (ConfigException $e) {
            echo $e->getMessage();
        }
    }

    public static function addPieceDetail(array $piece): void {
        try {
            self::$config['consignments'][0]['pieces_detail'] = $piece;
        } catch (ConfigException $e) {
            echo $e->getMessage();
        }
    }
}
