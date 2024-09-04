<?php
    class OptionInterface{
        public $data;
        public function __construct(
            array $data = array()
        ){
            $this->data = $data;
        }
    }

?>