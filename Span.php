<?php

    require_once('HTMLElement.php');
    require_once('SpanAttributes.php');


    /**
     * Span
     * @property SpanAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class Span extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new SpanAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('span', new SpanAttributes());
            return $start_tag.$text.'</span>';
        }

    }
?>