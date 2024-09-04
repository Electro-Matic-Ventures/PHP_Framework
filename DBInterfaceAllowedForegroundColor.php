<?php

    require_once('DBInterfaceAllowedParent.php');

    class DBInterfaceAllowedForegroundColor extends DBInterfaceAllowedParent{

        public $label;
        public array $data;

        public function __construct(array $data, $label){
            $this->data = $data[$label];
            $this->label = $label;
        }
    }

?>