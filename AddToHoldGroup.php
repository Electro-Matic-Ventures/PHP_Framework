<?php


    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('DBInterfaceSegment.php');
    require_once('DBInterfaceRowToDiv.php');
    require_once('SignInterfaceSegment.php');
    require_once("Utilities.php");


    /**
     * 
     * 
     * @property $segment_id
     */

    class AddToHoldGroup{
        
        public $chars_remain;
        public $holdgroup_id;
        public $row_id;
        public $segments;
        
        public function __construct($max_chars, $holdgroup_id, $row_id){
            $this->chars_remain = $max_chars;
            $this->holdgroup_id = $holdgroup_id;
            $this->row_id = $row_id;
            $this->segments = [];
        }

        public function go(){
            $group = new SignInterfaceHoldGroup(
                $this->holdgroup_id, 
                $this->row_id, 
                $this->segments
            );
            return $group;
        }

        public function add(DBInterface $Data, $segment_index){
            $leftover = "";
            $text = $this->clean_text($Data->segments[$segment_index]->text);
            if(strlen($text) > $this->chars_remain){
                $texts = $this->split($text);
                $leftover = $texts[1];
                $text = $texts[0];
            }
            $this->chars_remain -= strlen($text);

            $SignInterfaceSegment = new SignInterfaceSegment($Data, $segment_index, $text, $this->holdgroup_id); 
            array_push($this->segments, $SignInterfaceSegment);

            return $leftover;
        }

        private function clean_text($text){
            return str_replace("&nbsp;", " ", $text);
        }

        private function split($text){
            $string1 = substr($text, 0, $this->chars_remain - 1) . "-";
            $string2 = "-" . substr($text, $this->chars_remain - 1);
            return array($string1, $string2);
        }

    }


?>