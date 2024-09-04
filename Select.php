<?php

    require_once('HTMLElement.php');
    require_once('SelectAttributes.php');
    
    /**
     * Select
     * @property SelectAttributes $attributes
     * @property string $contained
     * @method draw
     */
    class Select extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new SelectAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag(
                'select', 
                new SelectAttributes()
            );
            return $start_tag.$text.'</select>';
        }

    }

    
?>