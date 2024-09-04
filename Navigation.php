<?php


    require_once('HTMLElement.php');
    require_once('NavigationAttributes.php');

    
    class Navigation extends HTMLElement{
        
        public $attributes;
        public $text;

        public function __construct(){
            $this->attributes = new NavigationAttributes();
            $this->text = "";
            return;
        }

        public function draw(){
            $start_tag = $this->generate_start_tag(
                'nav', 
                new NavigationAttributes()
            );
            $text = $this->text; 
            $end_tag = "</nav>";
            return $start_tag.$text.$end_tag;
        }

    }

?>