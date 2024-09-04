<?php

    
    require_once("DataclassParent.php");


    /**
     * data class for sign_parameters table
     * 
     * @property ? string $id
     * @property ? string $name
     * @property ? string $datetime;
     * @property ? string $format;
     */
    Class InterfaceSettingsTime extends DataclassParent {

        public ? string $id;
        public ? string $name;
        public ? string $datetime;
        public ? string $format;
        
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