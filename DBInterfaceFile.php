<?php


    /**
     * data class for file table interface to application
     * 
     * @property $id
     * @property $file_id
     * @property $address_pre_filler
     * @property $group_
     * @property $sign
     * @property $drive
     * @property $folder
     * @property $file
     */
    Class DBInterfaceFile{

        public $id;
        public $file_id;
        public $address_pre_filler;
        public $group_;
        public $sign;
        public $drive;
        public $folder;
        public $file_;
        
        public function __construct($data = null){
            if(is_null($data)) {
                foreach($this as $key => $value){
                    $this->{$key} = null;
                }
                return;
            }
            foreach($this as $key => $value){
                $this->{$key} = $data[$key];
            }
            return;
        }

    }

?>