<?php

    
    require_once("DataclassParent.php");


    /**
     * data class for sign_parameters table
     * 
     * @property $id
     * @property $background_color
     * @property $drive
     * @property $flash
     * @property $font_size
     * @property $font_weight
     * @property $foreground_color
     * @property $hold_time
     * @property $horizontal_alignment
     * @property $in_mode
     * @property $line_spacing
     * @property $out_mode
     * @property $scroll_speed
     * @property $text
     * @property $vertical_alignment
     * @property $wrap
     */
    Class InterfaceADPDefaults extends DataclassParent {

        public $id;
        public $background_color;
        public $drive;
        public $flash;
        public $font_size;
        public $font_weight;
        public $foreground_color;
        public $hold_time;
        public $horizontal_alignment;
        public $in_mode;
        public $line_spacing;
        public $out_mode;
        public $scroll_speed;
        public $text;
        public $vertical_alignment;
        public $wrap;
        
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