<?php

    require_once('HTMLElementAttributes.php');


    class OptionAttributes extends HTMLElementAttributes {
        
        public ? bool $disabled;
        public ? string $label;
        public ? bool $selected;
        public ? string $value;
        public ? bool $default;

        public function __construct(
            ? bool $disabled = null,
            ? string $label = null,
            ? bool $selected = null,
            ? string $value = null,
            ? bool $default = null
            ){
                parent::__construct();
                $this->disabled = $disabled;
                $this->label = $label;
                $this->selected = $selected;
                $this->value = $value;
                $this->default = $default;
                return;
        }

    }

?>