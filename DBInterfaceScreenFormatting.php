<?php

    
    /**
     * data class for segments table interface to application
     * 
     * @property $id
     * @property $file_id
     * @property $hold_time
     * @property $scroll_speed
     * @property $start_category
     * @property $start_option
     */
    class DBInterfaceScreenFormatting{
        
        public $id;
        public $file_id;
        public $hold_time;
        public $scroll_speed;
        public $start_category;
        public $start_option;
        
        public function __construct($data=null){
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