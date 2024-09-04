<?php

    require_once('Span.php');
    require_once('DBInterfaceDefaults.php');
    require_once("ADPFontParameters.php");
    require_once("StringToImageString.php");
    include_once("Fonts.php");

    class SignInterfaceSegmentToSpan{

        public int $width; // calculated during make_text(), used by parent div

        public function __construct(){
            $this->width = 0;
            return;
        }

        public function go(
            SignInterface $data, 
            SignInterfaceSegment $segment
            ){
                $span = new Span();
                $text = $this->make_text(
                    $data,
                    $segment
                );
                $class_list = $this->make_class_list(
                    $data->defaults,
                    $segment
                );
                $span->attributes->core->add_class_list($class_list);
                $style = $this->make_style(
                    $data,
                    $segment
                );
                $span->attributes->core->add_to_style($style);
                $span->contained = $text;
                return $span->draw();
        }

        private function make_class_list(
            SignInterfaceDefaults $defaults,
            SignInterfaceSegment $segment
            ): array {
                $flash = $this->set_default_if_needed(
                    $defaults->flash, 
                    $segment->flash
                );
                if($flash == "off") {
                    return [];
                }
                $class_list = [
                    "flash"
                ];
                return $class_list;
            }

        private function make_style(
            SignInterface $data,
            SignInterfaceSegment $segment
            ): string {
                $background_color = $this->set_default_if_needed(
                    $data->defaults->background_color, 
                    $segment->background_color
                );
                $imploder = [
                    "background-color: $background_color;",
                    "display: flex;",
                    "flex-direction: row;",
                    "height: 100%;",
                    "width: 100%;"
                ];
                $style = implode(" ", $imploder);
                return $style;
            }

        private static function set_default_if_needed($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

        private function make_text(
            SignInterface $data,
            SignInterfaceSegment $segment
            ): string {
                $text = $this->set_default_if_needed(
                    $data->defaults->text,
                    $segment->text
                );
                $weight = $this->get_weight($data, $segment);
                $size = $this->get_size($data, $segment);
                $font = Fonts::get($weight, $size);
                $color = $this->set_default_if_needed(
                    $data->defaults->foreground_color,
                    $segment->foreground_color
                );
                $image_string = StringToImageString::go(
                    $color,
                    $font,
                    $text
                );
                $this->width = $image_string->font->width;
                $text = "";
                foreach($image_string->characters as $key => $value){
                    $text .= $value;
                }
                return $text;
        }

        private function get_weight(
            SignInterface $data,
            SignInterfaceSegment $segment
            ) {
                $row_id = $segment->row_id;
                foreach($data->rows as $key => $value){
                    if ($row_id != $value->row_id) {
                        continue;
                    }
                    $weight = $this->set_default_if_needed(
                        $data->defaults->font_weight,
                        $value->font_weight
                    );
                    return $weight;
                }
                return $data->defaults->font_weight;
        }

        private function get_size(
            SignInterface $data,
            SignInterfaceSegment $segment
            ): string {
                $row_id = $segment->row_id;
                foreach($data->rows as $key => $value){
                    if ($row_id != $value->row_id) {
                        continue;
                    }
                    $size = $this->set_default_if_needed(
                        $data->defaults->font_size,
                        $value->font_size
                    );
                    return $size;
                }
                return $data->defaults->font_size;
        }

    }



?>