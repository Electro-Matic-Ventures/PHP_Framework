<?php


    require_once('DBInterfaceFile.php');


    class SignInterfaceFile{

        public $style;
        public $contents;
        public $row_count;
        public $vertical_alignment;

        public function __construct(DBInterfaceFile $data=null){
            if(is_null($data)){
                foreach($this as $key => $value){
                    $this->{$key} = null;
                }
            }
            return;
            foreach($this as $key => $value){
                $this->{$key} = $data[$key];
            }   
            return;
        }
    }

?>