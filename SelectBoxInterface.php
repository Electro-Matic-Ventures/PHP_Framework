<?php
    
    
    require_once('OptionInterface.php');
    
    
    class SelectBoxInterface{
        
        public $id;
        public $label;
        public $name;
        public $options;
        public $default;

        public function __construct(
            ? string $id = null,
            ? string $label = null,
            ? string $name = null,
            ? array $options = null,
            ? string $default = null
        ){
            $this->id = $id;
            $this->label = $label;
            $this->name = $name;
            $this->options = $options;
            $this->default = $default;
        }

    }

    
?>