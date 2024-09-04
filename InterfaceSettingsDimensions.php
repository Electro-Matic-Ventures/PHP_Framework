<?php

    
    require_once("DataclassParent.php");


    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $name
     * @property $width
     * @property $height
     */
    Class InterfaceSettingsDimensions extends DataclassParent {

        public ? string $id;
        public ? string $name;
        public ? string $width;
        public ? string $height;
        
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