<?php

    /**
     * @method void null_constructor() set all fields to null
     * @method void data_constructor(iterable $data)  
     */
    Class DataclassParent {

        public function null_constructor() {                
            foreach($this as $key => $value){
                $this->{$key} = null;
            }
            return;
        }

        public function data_constructor($data) { 
            foreach($data as $key=>$value){
                $this->$key = $value;
            }
            return;
        }

        public function get_properties() {
            return get_object_vars($this);
        }

        public function set_property($key, $value){
            if (!property_exists($this, $key)) {
                return;
            }
            $this->$key = $value;
            return;
        }

        public function get_values() {
            return get_object_vars($this);
        }

    }