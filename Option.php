<?php

    require_once('HTMLElement.php');
    require_once('OptionAttributes.php');
    
    /**
     * Option
     * @property OptionAttributes $attributes
     * @property string $contained
     * @method draw
     */
    class Option extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new OptionAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag(
                'option', 
                new OptionAttributes()
            );
            return $start_tag.$text.'</option>';
        }

    }

    
?>