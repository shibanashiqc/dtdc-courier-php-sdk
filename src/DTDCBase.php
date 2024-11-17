<?php

namespace Shibanashiqc\DtdcCourierPhpSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Shibanashiqc\DtdcCourierPhpSdk\DTDC;

class DTDCBase
{
    /**
     * searchPincode
     *
     * @param  mixed $org_pincode
     * @param  mixed $des_ppincode
     * @return 
     */

    private DTDC $dtdc;
    private $config;
    public function __construct(DTDC $dtdc)
    {
        $this->dtdc = $dtdc;
    }

    public function getPincodeRate($org_pincode, $des_ppincode)
    {
        try {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'Cookie' => 'GCLB="9b54643d45357e39"'
            ];
            $body = '{
                "orgPincode": "' . $org_pincode . '",
                "desPincode": "' . $des_ppincode . '",
            }';

            $request = new Request('POST', $this->dtdc::$pincode_api_url, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            return [
                'status' => $res->getStatusCode(),
                'body' => $res->getBody()->getContents()

            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'body' => $e->getMessage()
            ];
        }
    }

    /**
     * createNewShipment
     *
     * @param  mixed $config
     * @return array
     */
    public function createNewShipment($config = []): array
    {
        try {

            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'api-key' => $this->dtdc::$api_key
            ];

            $body = json_encode($config);
            $request = new Request('POST', $this->dtdc::$api_url . 'customer/integration/consignment/softdata', $headers, $body);
            $res = $client->sendAsync($request)->wait();
            return [
                'status' => $res->getStatusCode(),
                'body' => $res->getBody()->getContents()
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'body' => $e->getMessage()
            ];
        }
    }

    public function cancelShipment($shipment_ids = []): array
    {
        try {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'api-key' => $this->dtdc::$api_key
            ];

            $body = json_encode([
                'AWBNo' => $shipment_ids,
                'customerCode' => $this->dtdc::$customer_code,
            ]);

            $request = new Request('POST', $this->dtdc::$api_url . 'customer/integration/consignment/cancel', $headers, $body);
            $res = $client->sendAsync($request)->wait();
            return [
                'status' => $res->getStatusCode(),
                'body' => $res->getBody()->getContents()
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'body' => $e->getMessage()
            ];
        }
    }
        
    /**
     * generateToken
     *
     * @param  mixed $username
     * @param  mixed $password
     * @return array
     */
    public function generateToken($username, $password) : array
    {
        try {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
            ];
            
            $request = new Request('GET', $this->dtdc::$token_generation_url . '?username=' . $username . '&password=' . $password, $headers);
            $res = $client->sendAsync($request)->wait();
            return [
                'status' => $res->getStatusCode(),
                'body' => $res->getBody()->getContents()
            ];
            
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'body' => $e->getMessage()
            ];
            }
    }
    
    /**
     * getShippingLabel
     * @param  mixed $reference_number
     * @param mixed $label_code
     * @param mixed $label_format
     * @return mixed
     */
    
     public function getShippingLabel($reference_number, $label_code = 'SHIP_LABEL_4X6', $label_format = 'pdf') 
     {
         try {
             $client = new Client();
             $headers = [
                 'Content-Type' => 'application/json',
                 'api-key' => $this->dtdc::$api_key
             ];
             
             $request = new Request('GET', $this->dtdc::$label_api_url . '?reference_number=' . $reference_number . '&label_code=' . $label_code . '&label_format=' . $label_format, $headers);
             $res = $client->sendAsync($request)->wait();
             return $res->getBody();
            } catch (\Exception $e) {
             return [
                 'status' => 500,
                 'body' => $e->getMessage()
             ];
         }
     }
    
     public function getTrackingStatus($strcnno, $trkType = 'cnno', $addtnlDtl = 'Y') : array
     {
         try {
             $client = new Client();
             $headers = [
                 'Content-Type' => 'application/json',
                 'x-access-token' => $this->dtdc::$x_access_token,
                 'api-key' => $this->dtdc::$api_key
             ];
             
             $body = json_encode([
                'trkType' => $trkType,
                'strcnno' => $strcnno,
                'addtnlDtl' => $addtnlDtl
             ]);
             
             $request = new Request('POST', $this->dtdc::$tracking_api_url, $headers, $body);
             $res = $client->sendAsync($request)->wait();
             return [
                 'status' => $res->getStatusCode(),
                 'body' => $res->getBody()->getContents()
             ];
             }
             catch (\Exception $e) {
                 return [
                     'status' => 500,
                     'body' => $e->getMessage()
                 ];
            }
        }             
}
