<?php

    require_once('HTMLElement.php');
    require_once('InputAttributes.php');


    /**
     * Input
     * @property InputAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class Input extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new InputAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('input', new InputAttributes());
            return $start_tag.$text.'</input>';
        }

    }
?>