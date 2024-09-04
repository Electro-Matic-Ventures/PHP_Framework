<?php


    require_once('AddToHoldGroup.php');


    Class DBInterfaceRowToHoldGroups{
    
        public static function go(DBInterface $Data, $row_index){
            $holdgroup_count = 0;
            $holdgroups = [];
            $max_chars = self::set_size($Data, $row_index);
            $row_id = $Data->rows[$row_index]->row_id;
            $holdgroup_id = self::generate_holdgroup_id(
                $row_id, 
                $holdgroup_count
            );
            $AddToHoldGroup = new AddToHoldGroup(
                $max_chars, 
                $holdgroup_id, 
                $row_id
            );
            $holdgroup_count = $holdgroup_count + 1;
            for($i = 0; $i < count($Data->segments); $i++){
                $this_segment_row_id = $Data->segments[$i]->row_id;
                $this_row_id = $Data->rows[$row_index]->row_id;
                if ($this_segment_row_id != $this_row_id){
                    continue;
                }
                while (strlen($Data->segments[$i]->text) > 0){
                    $remaining_seg = $AddToHoldGroup->add($Data, $i);
                    if($remaining_seg)
                    {
                        array_push($holdgroups, $AddToHoldGroup->go());
                        $holdgroup_id = self::generate_holdgroup_id(
                            $row_id, 
                            $holdgroup_count
                        );
                        $AddToHoldGroup = new AddToHoldGroup(
                            $max_chars, 
                            $holdgroup_id, 
                            $row_id
                        );
                        $holdgroup_count = $holdgroup_count + 1;
                    }
                    $Data->segments[$i]->text = $remaining_seg;
                }   
            }
            array_push($holdgroups, $AddToHoldGroup->go());
            return $holdgroups;
        }

        private static function set_size(DBInterface $Data, $row_index){
            if($Data->screen_formatting->start_option == 'hold'){
                $width = $Data->sign_dimensions->width;
                $char_size = $Data->rows[$row_index]->font_size * 0.5;
                $max_chars = floor($width/$char_size);
                return $max_chars;
            }
            return 1000;
        }

        private static function generate_holdgroup_id(
            $row_id, 
            $holdgroup_count
            ){
                $holdgroup_id = "{$row_id}00H{strval($holdgroup_count)}";
                return $holdgroup_id;
        }

    }

?>