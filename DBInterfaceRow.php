<?php


    /**
     * data class for row table interface to application
     * 
     * @property string $id
     * @property string $file_id
     * @property int $number
     * @property string $font_weight
     * @property string $font_size
     * @property string $horizontal_alignment
     */
    class DBInterfaceRow{

        public $id;
        public $row_id;
        public $file_id;
        public $number;
        public $font_weight;
        public $font_size;
        public $horizontal_alignment;
        
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