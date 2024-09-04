<?php

    
    require_once("DataclassParent.php");


    /**
     * @property ? string $id;
     * @property ? string $file_id;
     * @property ? string $row_id;
     * @property ? string $number;
     * @property ? string $font_weight;
     * @property ? string $font_size;
     * @property ? string $hold_time;
     * @property ? string $horizontal_alignment;
     * @property ? string $in_mode;
     * @property ? string $scroll_speed;
     */    
    class InterfaceADPRowFormatting extends DataclassParent {

        public ? string $id;
        public ? string $file_id;
        public ? string $row_id;
        public ? string $number;
        public ? string $font_weight;
        public ? string $font_size;
        public ? string $hold_time;
        public ? string $horizontal_alignment;
        public ? string $in_mode;
        public ? string $scroll_speed;
        
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