<?php

    require_once('HTMLElementAttributes.php');

    class LabelAttributes extends HTMLElementAttributes{
        public $for;

        public function __construct(
            ?string $for = null
        ){
            parent::__construct();
            $this->for = $for;
            return;
        }
    }



?>