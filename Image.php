<?php

    require_once('HTMLElement.php');
    require_once('ContentDivisionAttributes.php');
    
    /**
     * Image
     * @property ImageAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class Image extends HTMLElement{

        public $attributes;

        public function __construct()
        {
            $this->attributes = new ImageAttributes();
            return;
        }

        public function draw(): string
        { 
            $start_tag = $this->generate_start_tag('img', new ImageAttributes());
            return $start_tag;
        }

    }

    
?>