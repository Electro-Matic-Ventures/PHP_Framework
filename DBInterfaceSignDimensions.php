<?php

    
    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $name
     * @property $height
     * @property $width
     */
    Class DBInterfaceSignDimensions {

        public $id;
        public $name;
        public $height;
        public $width;
        
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