<?php

    
    require_once("DataclassParent.php");

    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $name
     * @property $ip_address
     * @property $rack
     * @property $slot
     * @property $port
     * @property $db_number
     */
    Class InterfaceSettingsIpPartnerInput extends DataclassParent {

        public $id;
        public $name;
        public $ip_address;
        public $rack;
        public $slot;
        public $port;
        public $db_number;
        
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