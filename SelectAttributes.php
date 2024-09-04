<?php

    require_once('HTMLElementAttributes.php');


    class SelectAttributes extends HTMLElementAttributes {
        
        public $autocomplete;
        public $autofocus;
        public $disabled;
        public $form;
        public $multiple;
        public $required;
        public $size;
        public $name;

        public function __construct(
            ?string $autocomplete = null,
            ?string $autofocus = null,
            ?string $disabled = null,
            ?string $form = null,
            ?string $multiple = null,
            ?string $required = null,
            ?string $size = null,
            ?string $name = null
        ){
            parent::__construct();
            $this->autocomplete = $autocomplete;
            $this->autofocus = $autofocus;
            $this->disabled = $disabled;
            $this->form = $form;
            $this->multiple = $multiple;
            $this->required = $required;
            $this->size = $size;
            $this->name = $name;
            return;
        }

    }

?>