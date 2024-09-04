<?php

    require_once('Span.php');
    require_once('StyleColors.php');
    require_once('DBInterfaceDefaults.php');

    Class DBInterfaceSegmentToSpan{
        public function go(DBInterface $Data, $segment_index){
            $span = new Span();
            $text = $this->determine_style($Data->defaults->text, $Data->segments[$segment_index]->text);
            $span->contained = $text;
            $foreground_color = $this->determine_style($Data->defaults->foreground_color, $Data->segments[$segment_index]->foreground_color);
            $foreground_color_hex = COLOR2HEX[$foreground_color];
            $background_color = $this->determine_style($Data->defaults->background_color, $Data->segments[$segment_index]->background_color);
            $background_color_hex = COLOR2HEX[$background_color];
            $flash = $this->determine_style($Data->defaults->flash, $Data->segments[$segment_index]->flash);
            $span->attributes->core->add_to_style("color:$foreground_color_hex; background-color:$background_color_hex; flash:$flash;");
            return $span->draw();
        }
        private function determine_style($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }
    }

?>