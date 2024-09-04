<?php
    require_once('HTMLElement.php');
    require_once('LabelAttributes.php');

    /**
     * Label
     * @property LabelAttributes $attributes
     * @property string $contained
     * @method draw
     */
    class Label extends HTMLElement{
        public $attributes;
        public $contained;
        public function __construct(){
            $this->attributes = new LabelAttributes();
            return;
        }
        public function draw(): string
        {
            $text = $this->contained;
            $start_tag = $this->generate_start_tag('label', new LabelAttributes());
            return $start_tag.$text.'</label>';
        }
    }

?>