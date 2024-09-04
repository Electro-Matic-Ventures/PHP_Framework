<?php


    require_once('HTMLElement.php');
    require_once('ParagraphAttributes.php');

    
    class Paragraph extends HTMLElement{
        
        public $attributes;
        public $text;

        public function __construct(){
            $this->attributes = new ParagraphAttributes();
            $this->text = "";
            return;
        }

        public function draw(){
            $start_tag = $this->generate_start_tag(
                'p', 
                new ParagraphAttributes()
            );
            $paragraph_text = $this->text; 
            $end_tag = "</p>";
            return $start_tag.$paragraph_text.$end_tag;
        }

    }

?>