<?php

    
    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $ip_address
     * @property $cidr
     * @property $gateway
     */
    Class DBInterfaceSignSystemParameters {

        public $id;
        public $ip_address;
        public $cidr;
        public $gateway;
        
        public function __construct($data = null){
            if(is_null($data)) {
                foreach($this as $key => $value){
                    $this->{$key} = null;
                }
                return;
            }
            foreach($this as $key => $value){
                $this->{$key} = $data[$key];
            }
            return;
        }

    }


?>