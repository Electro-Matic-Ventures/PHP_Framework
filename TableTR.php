<?php

    require_once('TableTRAttributes.php');


    /**
     * TableTR
     * @property TableTRAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class TableTR extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new TableTRAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('tr', new TableTRAttributes());
            return $start_tag.$text.'</tr>';
        }

    }
?>