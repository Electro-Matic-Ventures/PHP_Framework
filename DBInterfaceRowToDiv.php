<?php


    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('DBInterfaceRow.php');
    require_once('DBInterfaceDefaults.php');


    Class DBInterfaceRowToDiv{

        public function go(DBInterface $Data, $row_index){
            $div = new ContentDivision();
            $div->attributes->core->add_to_style($this->set_style(
                $Data->defaults,
                $Data->file->mode, 
                $Data->rows[$row_index]
            ));
            $div->attributes->core->add_to_class($this->set_class($Data));
            $div->contained = $this->concat_segments($Data, $Data->rows[$row_index]->row_id);
            return $div->draw();
        }

        private function set_style(DBInterfaceDefaults $defaults, $mode, DBInterfaceRow $row){
            $style = "font-size:{$this->determine_style(
                $defaults->font_size,
                $row->font_size
            )}px; ";
            $style .= "font-weight:{$this->determine_style(
                $defaults->font_weight, 
                $row->font_weight
            )}; ";
            $style .= $this->set_horizontal_alignment(
                $defaults->horizontal_alignment, 
                $row->horizontal_alignment
            );
            $style .= "display:flex; ";
            $style .= "flex-direction:row; ";
            $style .= "flex-grow:0; ";
            $style .= "flex-shrink:0; ";
            return trim($style);
        }

        private function set_horizontal_alignment($default, $value){
            $alignment = $this->determine_style($default, $value);
            switch ($alignment) {
                case 'left':
                    return 'justify-content:flex-start; ';
                case 'center':
                    return 'justify-content:center; ';
                case 'right':
                    return 'justify-content:flex-end; ';                
                default:
                    return 'justify-content:center; ';
            }
        }

        private function set_class(DBInterface $interface){
            return $this->determine_style(
                $interface->defaults->mode,
                $interface->file->mode
            );
        }

        private function determine_style($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

        private function concat_segments(DBInterface $Data, $row_id){
            $complete = "";
            for($i = 0; $i < count($Data->segments); $i++){
                if ($Data->segments[$i]->row_id != $row_id){
                    continue;
                }
                $DBInterfaceSegmentToTD = new DBInterfaceSegmentToSpan();
                $complete .= $DBInterfaceSegmentToTD->go($Data, $i);
            }
            return $complete;
        }

    }

    
?>