<?php


    require_once('ContentDivision.php');
    require_once('DBInterfaceSegmentToSpan.php');
    require_once('DBInterfaceRow.php');
    require_once('DBInterfaceDefaults.php');
    require_once('SignInterfaceHoldGroupToDiv.php');


    class SignInterfaceRowToDiv{

        public int $width;
        
        public function __construct(){
            $this->width = 0;
        }

        public function go(SignInterface $data, $row_index){
            $div = new ContentDivision();
            $div->contained = $this->concat_holdgroups($data, $row_index);
            $style = $this->set_style(
                $data,
                $data->rows[$row_index]
            );
            $div->attributes->core->add_to_style($style);
            $class = $this->set_class($data);
            $div->attributes->core->add_to_class($class);
            return $div->draw();
        }

        private function set_style(
            SignInterface $data, 
            SignInterfaceRow $row
            ){
                $font_size = intval(self::get_height($data->defaults, $row));
                $font_size += 1;
                $style = [
                    "display: flex;",
                    "flex-direction: row;",
                    "height: {$font_size}px;",
                    $this->set_horizontal_alignment($data->defaults, $row),
                    "width: 100%;",
                    "overflow: hidden;"
                ];
                $style = implode(" ", $style);
                return $style;
        }

        private function get_height(
            SignInterfaceDefaults $defaults, 
            SignInterfaceRow $row
            ) {
                if(is_null($row->font_size)) {
                    return $defaults->font_size;
                }
                return $row->font_size;
        }

        private function set_horizontal_alignment(
            SignInterfaceDefaults $defaults, 
            SignInterfaceRow $row
            ): string {
                $alignment = $this->determine_style(
                    $defaults->horizontal_alignment, 
                    $row->horizontal_alignment
                );
                switch ($alignment) {
                    case 'left':
                        return 'justify-content:flex-start;';
                    case 'center':
                        return 'justify-content:center;';
                    case 'right':
                        return 'justify-content:flex-end;';                
                    default:
                        return 'justify-content:center;';
                }
        }

        private function set_class(SignInterface $interface){
            if ($this->width < $interface->sign_dimensions->width){
                return;
            }
            if ($interface->mode == "hold"){
                $hold_time = $this->determine_style(
                    $interface->hold_time,
                    $interface->defaults->hold_time
                );
                return "holdtime_{$hold_time}";
            }
            $class = $interface->mode;
            return $class;
        }

        private function determine_style($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

        private function concat_holdgroups(SignInterface $data, $row_index){
            $complete = "";
            $i_max = count($data->rows[$row_index]->holdgroups);
            for($i = 0; $i < $i_max; $i++){
                $converter = new SignInterfaceHoldGroupToDiv();
                $complete .= $converter->go($data, $row_index, $i);
                if ($converter->width > $this->width) {
                    $this->width = $converter->width;
                }
            }
            return $complete;
        }

    }

    
?>