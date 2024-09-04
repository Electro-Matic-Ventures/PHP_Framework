<?php


    /**
     * data class for current_file table
     */
    Class DBInterfaceCurrentFile{
        
        public $id;
        public $file_id;

        public function __construct($data=null){
            if (is_null($data)){
                $this->id = null;
                $this->file_id = null;
                return;
            }  
            $this->id = $data["id"];
            $this->file_id = $data["file_id"];
            return;
        }
        
    }