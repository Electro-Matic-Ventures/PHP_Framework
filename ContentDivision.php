<?php

    require_once('HTMLElement.php');
    require_once('ContentDivisionAttributes.php');
    
    /**
     * ContentDivision
     * @property ContentDivisionAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class ContentDivision extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new ContentDivisionAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('div', new ContentDivisionAttributes());
            return $start_tag.$text.'</div>';
        }

    }

    
?>