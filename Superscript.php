<?php


    require_once('HTMLElement.php');
    require_once('SuperscriptAttributes.php');

    
    class Superscript extends HTMLElement{
        
        public $attributes;
        public $text;

        public function __construct(){
            $this->attributes = new SuperscriptAttributes();
            $this->text = "";
            return;
        }

        public function draw(){
            $start_tag = $this->generate_start_tag(
                'sup', 
                new SuperscriptAttributes()
            );
            $paragraph_text = $this->text; 
            $end_tag = "</sup>";
            return $start_tag.$paragraph_text.$end_tag;
        }

    }

?>