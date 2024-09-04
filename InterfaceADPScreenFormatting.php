<?php

    
    require_once("DataclassParent.php");


    /**
     * @property ? string $id;
     * @property ? string $file_id;
     * @property ? string $vertical_alignment;
     */    
    class InterfaceADPScreenFormatting extends DataclassParent {

        public ? string $id;
        public ? string $file_id;
        public ? string $vertical_alignment;
        
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