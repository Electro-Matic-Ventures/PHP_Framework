<?php


    class DataClass {

        public $data = array();

        public function __construct() {
            return;
        }

        public function get($key) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        }

        public function set($key, $value) {
            $this->data[$key] = $value;
            return;
        }
        
    }
?>