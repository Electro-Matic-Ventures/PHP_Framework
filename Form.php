<?php

    require_once('HTMLElement.php');
    require_once('FormAttributes.php');


    /** Form
     * @property FormAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class Form extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new FormAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('form', new FormAttributes());
            return $start_tag.$text.'</form>';
        }

    }
?>