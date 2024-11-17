<?php 

namespace Shibanashiqc\DtdcCourierPhpSdk;
use Shibanashiqc\DtdcCourierPhpSdk\DTDCBase;

class DTDC {
    static $api_key = '';
    static $x_access_token = '';
    static $devlopment_url = 'https://demodashboardapi.shipsy.in/api/';
    static $production_url = 'https://dtdcapi.shipsy.io/api/';
    static $pincode_api_url = 'https://smarttrack.ctbsplus.dtdc.com/ratecalapi/PincodeApiCall';
    
    static $dev_token_generation_api_url = 'https://dtdcstagingapi.dtdc.com/dtdc-tracking-api/dtdc-api/api/dtdc/authenticate';
    static $prod_token_generation_api_url = 'https://blktracksvc.dtdc.com/dtdc-api/api/dtdc/authenticate';
    static $dev_tracking_api_url = 'https://dtdcstagingapi.dtdc.com/dtdc-tracking-api/dtdc-api/rest/JSONCnTrk/getTrackDetails';
    static $prod_tracking_api_url = 'https://blktracksvc.dtdc.com/dtdc-api/rest/JSONCnTrk/getTrackDetails';
    static $tracking_api_url = '';
    static $api_url = '';
    static $token_generation_url = '';
    static $dev_label_api_url = 'https://demodashboardapi.shipsy.in/api/customer/integration/consignment/shippinglabel/stream';
    static $prod_label_api_url = 'https://dtdcapi.shipsy.io/api/customer/integration/consignment/shippinglabel/stream';
    static $label_api_url = '';
    static $customer_code = '';
    
    public DTDCBase $base;

    /**
     * __construct
     *
     * @param  mixed $api_key
     * @param  mixed $x_access_token
     * @param  mixed $is_production
     * @return void
     */
    public function __construct($api_key, $x_access_token, $is_production = false, )
    {
        self::$api_key = $api_key;
        self::$x_access_token = $x_access_token;
        if ($is_production) {
            self::$api_url = self::$production_url;
            self::$token_generation_url = self::$prod_token_generation_api_url;
            self::$label_api_url = self::$prod_label_api_url;
            self::$tracking_api_url = self::$prod_tracking_api_url;
        } else {
            self::$api_url = self::$devlopment_url;
            self::$token_generation_url = self::$dev_token_generation_api_url;
            self::$label_api_url = self::$dev_label_api_url;
            self::$tracking_api_url = self::$dev_tracking_api_url;
        }
        
        $this->base = new DTDCBase($this);
    }

    /**
     * getPincodeApiUrl
     *
     * @return string
     */
    public function getPincodeApiUrl()
    {
        return self::$pincode_api_url;
    }

    /**
     * getTrackingApiUrl
     *
     * @return string
     */
    public function getTrackingApiUrl()
    {
        return self::$tracking_api_url;
    }

    /**
     * getApiUrl
     *
     * @return string
     */
    public function getApiUrl()
    {
        return self::$api_url;
    }

    /**
     * get_api_key
     * @return string
     * 
     */
    public function getApiKey()
    {
        return self::$api_key;
    }

    /**
     * get_x_access_token
     * @return string
     * 
     */
    public function getXAccessToken()
    {
        return self::$x_access_token;
    }

    /**
     * set_api_key
     * @param string $api_key
     * 
     */
    public function setApiKey($api_key)
    {
        self::$api_key = $api_key;
    }

    /**
     * set_x_access_token
     * @param string $x_access_token
     * 
     */
    public function setXAccessToken($x_access_token)
    {
        self::$x_access_token = $x_access_token;
    }

    /**
     * set_api_url
     * @param string $api_url
     * 
     */
    public function setApiUrl($api_url)
    {
        self::$api_url = $api_url;
    }

    /**
     * set_pincode_api_url
     * @param string $pincode_api_url
     * 
     */
    public function setPincodeApiUrl($pincode_api_url)
    {
        self::$pincode_api_url = $pincode_api_url;
    }

    /**
     * set_tracking_api_url
     * @param string $tracking_api_url
     * 
     */
    public function setTrackingApiUrl($tracking_api_url)
    {
        self::$tracking_api_url = $tracking_api_url;
    }

    /**
     * set_devlopment_url
     * @param string $devlopment_url
     * 
     */
    public function setDevlopmentUrl($devlopment_url)
    {
        self::$devlopment_url = $devlopment_url;
    }

    /**
     * set_production_url
     * @param string $production_url
     * 
     */
    public function setProductionUrl($production_url)
    {
        self::$production_url = $production_url;
    }

    /**
     * get_devlopment_url
     * @return string
     * 
     */
    public function getDevlopmentUrl()
    {
        return self::$devlopment_url;
    }

    /**
     * get_production_url
     * @return string
     * 
     */
    public function getProductionUrl()
    {
        return self::$production_url;
    }
    
    /**
     * set_customer_code
     * @param string $customer_code
     * 
     */
    public function setCustomerCode($customer_code)
    {
        self::$customer_code = $customer_code;
    }
    /**
     * get_customer_code
     * @return string
     * 
     */
    public function getCustomerCode()
    {
        return self::$customer_code;
    }
    
    /**
     * token_generation_url
     * @return string
     * 
     */
    public function getTokenGenerationUrl()
    {
        return self::$token_generation_url;
    }
    
    /**
     * set_token_generation_url
     * @param string $token_generation_url
     * 
     */
    public function setTokenGenerationUrl($token_generation_url)
    {
        self::$token_generation_url = $token_generation_url;
    }
    
    /**
     * getDevTokenGenerationUrl
     * @return string
     * 
     */
    public function getDevTokenGenerationUrl()
    {
        return self::$dev_token_generation_api_url;
    }
    
    /**
     * getProdTokenGenerationUrl
     * @return string
     * 
     */
    public function getProdTokenGenerationUrl()
    {
        return self::$prod_token_generation_api_url;
    }
    
    /**
     * setDevTokenGenerationUrl
     * @param string $dev_token_generation_api_url
     * return void
     */
    
     public function setDevTokenGenerationUrl($dev_token_generation_api_url)
     {
         self::$dev_token_generation_api_url = $dev_token_generation_api_url;
     }
     
     /**
      * setProdTokenGenerationUrl
      * @param string $prod_token_generation_api_url
      * return void
      */
     
     public function setProdTokenGenerationUrl($prod_token_generation_api_url)
     {
         self::$prod_token_generation_api_url = $prod_token_generation_api_url;
     }
     
     /**
      * getLabelApiUrl
      * @return string
      * 
      */
      
      public function getLabelApiUrl()
      {
          return self::$label_api_url;
      }
      
      /**
       * setLabelApiUrl
       * @param string $label_api_url
       * return void
       */
      
      public function setLabelApiUrl($label_api_url)
      {
          self::$label_api_url = $label_api_url;
      }
      
      /**
       * getDevLabelApiUrl
       * @return string
       * 
       */
      
      public function getDevLabelApiUrl()
      {
          return self::$dev_label_api_url;
      }
      
      /**
       * getProdLabelApiUrl
       * @return string
       * 
       */
      
      public function getProdLabelApiUrl()
      {
          return self::$prod_label_api_url;
      }
      
      /**
       * setDevLabelApiUrl
       * @param string $dev_label_api_url
       * return void
       */
      
      public function setDevLabelApiUrl($dev_label_api_url)
      {
          self::$dev_label_api_url = $dev_label_api_url;
      }
      
      /**
       * setProdLabelApiUrl
       * @param string $prod_label_api_url
       * return void
       */
      
      public function setProdLabelApiUrl($prod_label_api_url)
      {
          self::$prod_label_api_url = $prod_label_api_url;
      }
      
      /**
       * getDevTrackingApiUrl
       * @return string
       * 
       */
      
      public function getDevTrackingApiUrl()
      {
          return self::$dev_tracking_api_url;
      }
      
      /**
       * getProdTrackingApiUrl
       * @return string
       * 
       */
      
      public function getProdTrackingApiUrl()
      {
          return self::$prod_tracking_api_url;
      }
      
      /**
       * setDevTrackingApiUrl
       * @param string $dev_tracking_api_url
       * return void
       */
      
      public function setDevTrackingApiUrl($dev_tracking_api_url)
      {
          self::$dev_tracking_api_url = $dev_tracking_api_url;
      }
      
      /**
       * setProdTrackingApiUrl
       * @param string $prod_tracking_api_url
       * return void
       */
      
      public function setProdTrackingApiUrl($prod_tracking_api_url)
      {
          self::$prod_tracking_api_url = $prod_tracking_api_url;
      } 
}