<?php

    require_once('HTMLElement.php');
    require_once('TableAttributes.php');


    /**
     * Table
     * @property TableAttributes $attributes
     * @property mixed $contained
     * @method draw
     */
    class Table extends HTMLElement{

        public $attributes;
        public $contained;

        public function __construct()
        {
            $this->attributes = new TableAttributes();
            return;
        }

        public function draw(): string
        { 
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('table', new TableAttributes());
            return $start_tag.$text.'</table>';
        }

    }
?>