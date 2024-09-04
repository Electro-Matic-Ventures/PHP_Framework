<?php

    
    require_once("DataclassParent.php");


    /**
     * @property ? string $id;
     * @property ? string $web;
     * @property ? string $dp;
     * @property ? string $adp;
     */    
    class InterfaceADPSegmentFormatting extends DataclassParent {

        public ? string $id;
        public ? string $adp;
        public ? string $api;
        public ? string $plc;
        
        public function __construct($data = null) {
            if (is_null($data)) {
                $this->null_constructor();
                return;
            }
            $this->data_constructor($data);
            return;
        }

    }

?>