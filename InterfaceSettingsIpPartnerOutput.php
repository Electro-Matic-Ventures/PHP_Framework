<?php

    
    require_once("DataclassParent.php");

    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $name
     * @property $type
     * @property $ip_address
     * @property $port
     */
    Class InterfaceSettingsIpPartnerOutput extends DataclassParent {

        public $id;
        public $name;
        public $type;
        public $ip_address;
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