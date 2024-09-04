<?php

    
    /**
     * data class for segments table interface to application
     * 
     * @property $id
     * @property $segment_id
     * @property $row_id
     * @property $file_id
     * @property $number
     * @property $foreground_color
     * @property $background_color
     * @property $flash
     * @property $text
     */
    class DBInterfaceSegment{
        
        public $id;
        public $file_id;
        public $row_id;
        public $segment_id;
        public $number;
        public $foreground_color;
        public $background_color;
        public $flash;
        public $text;
        
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