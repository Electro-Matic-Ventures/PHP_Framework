<?php


    /**
     * data class for segments table interface to application
     * 
     * @property string $id
     * @property string $hold_time
     * @property string $scroll_speed
     * @property string $vertical_alignment
     * @property string $in_mode
     * @property string $out_mode
     * @property string $font_weight
     * @property string $font_size
     * @property string $horizontal_alignment
     * @property string $foreground_color
     * @property string $background_color
     * @property string $flash
     * @property string $text
     */
    class DBInterfaceDefaults{

        public $id;
        public $hold_time;
        public $scroll_speed;
        public $vertical_alignment;
        public $in_mode;
        public $out_mode;
        public $font_weight;
        public $font_size;
        public $horizontal_alignment;
        public $foreground_color;
        public $background_color;
        public $flash;
        public $text;
        
        public function __construct($data){
            if (is_null($data)) {
                foreach($this as $key => $value){
                    $this->{$key} = null;
                }
            }
            foreach($this as $key => $value){
                $this->{$key} = $data[$key];
            }
            return;
        }

    }


?>