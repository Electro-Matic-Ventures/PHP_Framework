<?php

    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('DBInterfaceSegment.php');
    require_once('DBInterfaceRowToDiv.php');
    
    /**
     * 
     * 
     * @property $segment_id
     */

    class HoldGroupDiv{
        
        public $chars_remain;
        public $max_chars;
        public $complete;
        
        public function __construct($max_chars){
            $this->chars_remain = $max_chars;
            $this->max_chars = $max_chars;
            $this->complete = "";
        }


        public function add(DBInterface $Data, $segment_index){
            $leftover = "";
            $has_room = true;
            $text = $this->clean_text($Data->segments[$segment_index]->text);
            if(strlen($text) > $this->chars_remain){
                $texts = $this->split($text);
                $leftover = $texts[1];
                $has_room = false;
                if(!$texts[0]){
                    return array($has_room, $leftover);
                }
                $Data->segments[$segment_index]->text = $texts[0];
            }
            $this->chars_remain -= strlen($text);
            $DBInterfaceSegmentToTD = new DBInterfaceSegmentToSpan();
            $this->complete .= $DBInterfaceSegmentToTD->go($Data, $segment_index);
            return array($has_room, $leftover);
        }

        private function clean_text($text){
            return str_replace("&nbsp;", " ", $text);
        }

        private function split($text){
            $substring = substr($text, 0, $this->chars_remain);
            var_dump($substring);
            return;
            $last_space = strrpos($substring, " ");
            if(!$last_space){
                return array(false, $text);
            }
            $string1 = substr($text, 0, $last_space+1);
            $string2 = substr($text, $last_space+1);
            return array($string1, $string2);
        }

        public function draw($Data, $row_index){
            $div = new ContentDivision();
            $div->attributes->core->add_to_class("hold");
            $div->attributes->core->add_to_style($this->set_style($Data->defaults, $Data->rows[$row_index]));

            $div->contained = $this->complete;

            return $div->draw();
        }

        private function set_style(DBInterfaceDefaults $defaults, DBInterfaceRow $row){
            $font_size = $this->determine_style($defaults->font_size, $row->font_size);
            $font_weight = $this->determine_style($defaults->font_weight, $row->font_weight);
            $horizontal_alignment = $this->determine_style($defaults->horizontal_alignment, $row->horizontal_alignment);
            return "font-size:{$font_size}px; font-weight:$font_weight; text-align:$horizontal_alignment; display:none"; #display:hidden
        }

        private function determine_style($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

    }


?>