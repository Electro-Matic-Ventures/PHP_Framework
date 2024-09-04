<?php


    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('SignInterfaceSegmentToSpan.php');
    require_once('DBInterfaceSegment.php');
    require_once('DBInterfaceRowToDiv.php');
    require_once('HoldGroupDiv.php');
    require_once("ScrollDriver.php");
    require_once('Utilities.php');

    
    /**
     * @property $segment_id
     */

    class SignInterfaceHoldGroupToDiv{
        
        public int $width;

        public function __construct(){
            $this->width = 0;
            return;
        }

        public function go(
            SignInterface $data, 
            $row_index, 
            $holdgroup_index
            ){
                $div = new ContentDivision();
                $div->attributes->core->add_to_class("holdgroup");
                $div->contained = $this->concat_segments(
                    $data, 
                    $row_index, 
                    $holdgroup_index
                );
                $style = $this->set_style(
                    $data,
                    $holdgroup_index,
                    $row_index
                );
                $div->attributes->core->add_to_style($style);
                return $div->draw();
        }

        private function set_style(
            SignInterface $data,
            int $holdgroup_index,
            int $row_index
            ){
                $imploder = [
                    "display: block;",
                    "height: 100%;",
                    "width: {$this->width}px;"
                ];
                if ($data->mode == "scroll") {
                    $scroll_style_attributes = $this->calculate_scroll(
                        $data,
                        $holdgroup_index,
                        $row_index
                    );
                    foreach($scroll_style_attributes as $key => $value){
                        array_push($imploder, $value);
                    }
                }
                $style = implode(" ", $imploder);
                return $style;
        }

        private function calculate_scroll(
            SignInterface $data,
            int $holdgroup_index,
            int $row_index
            ) {
                return ScrollDriver::style_attributes(
                    $data,
                    $row_index,
                    $holdgroup_index
                );
        }

        private function concat_segments(
            SignInterface $data, 
            $row_index, 
            $holdgroup_index
            ){
                $this_row = $data->rows[$row_index];
                $segments = $this_row->holdgroups[$holdgroup_index]->segments;
                $complete = "";
                $i_max = count($segments);
                $this->width = 0;
                for($i = 0; $i < $i_max; $i++){
                    $this_segment = $segments[$i];
                    if ($this_segment->row_id != $this_row->row_id){
                        continue;
                    }
                    $converter = new SignInterfaceSegmentToSpan();
                    $complete .= $converter->go(
                        $data, 
                        $this_segment
                    );
                    $this->width += $converter->width;
                }
                return $complete;
        }

    }
