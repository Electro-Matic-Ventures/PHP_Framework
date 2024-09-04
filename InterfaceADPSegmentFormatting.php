<?php

    
    require_once("DataclassParent.php");


    /**
     * @property ? string $id;
     * @property ? string $file_id;
     * @property ? string $row_id;
     * @property ? string $segment_id;
     * @property ? string $number;
     * @property ? string $foreground_color;
     * @property ? string $background_color;
     * @property ? string $flash;
     * @property ? string $text;
     */    
    class InterfaceADPSegmentFormatting extends DataclassParent {

        public ? string $id;
        public ? string $file_id;
        public ? string $row_id;
        public ? string $segment_id;
        public ? string $number;
        public ? string $foreground_color;
        public ? string $background_color;
        public ? string $flash;
        public ? string $text;
        
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