<?php

    /**
     * 
     * 
     * @property $id
     * @property $hold_time
     * @property $scroll_speed
     * @property $vertical_alignment
     * @property $mode - allowed: ["scroll", "hold"]
     * @property array[SignInterfaceRow] $rows
     * @property $sign_dimensions
     * @property $sign_ip
     * @property SignInterfaceDefaults $defaults
     */
    Class SignInterface{

        public $file_id;
        public $hold_time;
        public $scroll_speed;
        public $vertical_alignment;
        public $mode;
        public $widest;
        public $rows;
        public $sign_dimensions;
        public $sign_ip;
        public SignInterfaceDefaults $defaults;
        
        public function __construct(
            DBInterface $data = null, 
            $rows, 
            SignInterfaceDefaults $defaults
            ){
                $this->file_id = $data->file->file_id;
                $this->hold_time = $data->screen_formatting->hold_time;
                $this->scroll_speed = $data->screen_formatting->scroll_speed;
                $this->vertical_alignment = $data->screen_formatting->start_category;
                $this->mode = $data->screen_formatting->start_option;
                $this->sign_dimensions = $data->sign_dimensions;
                $this->sign_ip = $data->sign_ip;
                $this->defaults = $defaults;            
                $this->rows = $rows;      
                $this->widest = $this->calculate_widest();      
                return;
        }

        private function calculate_widest(): int {
            $longest = 0;
            foreach($this->rows as $key=>$row) {
                foreach($row->holdgroups as $key=>$holdgroup) {
                    $length = 0;
                    foreach($holdgroup->segments as $key=>$segment){
                        $length += strlen($segment->text);
                    }
                    if($length > $longest){
                        $longest = $length;
                    }
                }
            }
            if($longest <= 0) {
                $longest = $this->sign_dimensions->width;
            }
            return $longest;
        }

    }

?>