<?php

    require_once('HTMLElement.php');
    require_once('TableTDAttributes.php');

    /**
     * TableTD
     * @property TableTDAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class TableTD extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new TableTDAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('td', new TableTDAttributes());
            return $start_tag.$text.'</td>';
        }

    }
?>