<?php


    require_once('HTMLElement.php');
    require_once('AnchorAttributes.php');

    
    class Anchor extends HTMLElement{
        
        public $attributes;
        public $text;

        public function __construct(){
            $this->attributes = new AnchorAttributes();
            $this->text = "";
            return;
        }

        public function draw(){
            $start_tag = $this->generate_start_tag(
                'a', 
                new AnchorAttributes()
            );
            $paragraph_text = $this->text; 
            $end_tag = "</a>";
            return $start_tag.$paragraph_text.$end_tag;
        }

    }

?>