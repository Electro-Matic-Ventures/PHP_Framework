<?php

    
    require_once("DataclassParent.php");

    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $interface
     * @property $name
     * @property $mode
     * @property $ip_address
     * @property $cidr
     * @property $gateway
     * @property $port
     */
    Class InterfaceSettingsIpSelf extends DataclassParent {

        public $id;
        public $interface;
        public $name;
        public $mode;
        public $ip_address;
        public $cidr;
        public $gateway;
        public $port;
        
        public function __construct($data = null){
            if(is_null($data)) {
                $this->null_constructor();
                return;
            }
            $this->data_constructor($data);
            return;
        }

    }


?>