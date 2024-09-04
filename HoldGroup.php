<?php

    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('DBInterfaceSegment.php');
    require_once('DBInterfaceRowToDiv.php');
    require_once('HoldGroupDiv.php');

    
    /**
     * 
     * 
     * @property $segment_id
     */

    class HoldGroup{
        
        
        public function __construct(){
        }

        public function go(DBInterface $Data, $row_index){
            $max_chars = $this->set_size($Data, $row_index);
            $holdgroups = "";
            $HoldGroupDiv = new HoldGroupDiv($max_chars);
            for($i = 0; $i < count($Data->segments); $i++){
                if ($Data->segments[$i]->row_id != $Data->rows[$row_index]->row_id){
                    continue;
                }
                $text_remain = true;
                while ($text_remain){
                    $add_array = $HoldGroupDiv->add($Data, $i);
                    if(!$add_array[0])
                    {
                        $holdgroups .= $HoldGroupDiv->draw($Data, $row_index);
                        $HoldGroupDiv = new HoldGroupDiv($max_chars);
                    }
                    if($add_array[1] == "")
                    {
                        $text_remain = false;
                    }
                    else 
                    {
                        $Data->segments[$i]->text = $add_array[1];
                    }
                }   
            }
            $holdgroups .= $HoldGroupDiv->draw($Data, $row_index);
            return $this->draw($Data, $row_index, $holdgroups);
        }

        private function set_size(DBInterface $Data, $row_index){
            $width = $Data->sign_parameters->width;
            $char_size = $Data->rows[$row_index]->font_size * 0.5;
            $max_chars = floor($width/$char_size);
            return $max_chars;
        }

        private function draw($Data, $row_index, $holdgroups){
            $div = new ContentDivision();
            $div->attributes->core->add_to_class("holdgroup");
            $div->attributes->core->add_to_class("holdtime:{$Data->file->hold_time}");
            $div->attributes->core->add_to_style($this->set_style($Data->defaults, $Data->rows[$row_index]));
            $div->contained = $holdgroups;
            return $div->draw();
        }

        private function set_style(DBInterfaceDefaults $defaults, DBInterfaceRow $row){
            $font_size = $this->determine_style($defaults->font_size, $row->font_size);
            $font_weight = $this->determine_style($defaults->font_weight, $row->font_weight);
            $horizontal_alignment = $this->determine_style($defaults->horizontal_alignment, $row->horizontal_alignment);
            return "font-size:{$font_size}px; font-weight:$font_weight; text-align:$horizontal_alignment;";
        }

        private function determine_style($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

    }


?>