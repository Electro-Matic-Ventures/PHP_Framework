<?php


    require_once("Image.php");
    require_once("ImageAttributes.php");
    require_once("ImageString.php");


    class StringToImageString {

        private const CODES = [
            " "  => "0020",
            "!"  => "0021",
            "\"" => "0022",
            "#"  => "0023",
            "$"  => "0024",
            "%"  => "0025",
            "&"  => "0026",
            "'"  => "0027",
            "("  => "0028",
            ")"  => "0029",
            "*"  => "002A",
            "+"  => "002B",
            ","  => "002C",
            "-"  => "002D",
            "."  => "002E",
            "/"  => "002F",
            "0"  => "0030",
            "1"  => "0031",
            "2"  => "0032",
            "3"  => "0033",
            "4"  => "0034",
            "5"  => "0035",
            "6"  => "0036",
            "7"  => "0037",
            "8"  => "0038",
            "9"  => "0039",
            ":"  => "003A",
            ";"  => "003B",
            "<"  => "003C",
            "="  => "003D",
            ">"  => "003E",
            "?"  => "003F",
            "@"  => "0040",
            "A"  => "0041",
            "B"  => "0042",
            "C"  => "0043",
            "D"  => "0044",
            "E"  => "0045",
            "F"  => "0046",
            "G"  => "0047",
            "H"  => "0048",
            "I"  => "0049",
            "J"  => "004A",
            "K"  => "004B",
            "L"  => "004C",
            "M"  => "004D",
            "N"  => "004E",
            "O"  => "004F",
            "P"  => "0050",
            "Q"  => "0051",
            "R"  => "0052",
            "S"  => "0053",
            "T"  => "0054",
            "U"  => "0055",
            "V"  => "0056",
            "W"  => "0057",
            "X"  => "0058",
            "Y"  => "0059",
            "Z"  => "005A",
            "["  => "005B",
            "\\" => "005C",
            "]"  => "005D",
            "^"  => "005E",
            "_"  => "005F",
            "`"  => "0060",
            "a"  => "0061",
            "b"  => "0062",
            "c"  => "0063",
            "d"  => "0064",
            "e"  => "0065",
            "f"  => "0066",
            "g"  => "0067",
            "h"  => "0068",
            "i"  => "0069",
            "j"  => "006A",
            "k"  => "006B",
            "l"  => "006C",
            "m"  => "006D",
            "n"  => "006E",
            "o"  => "006F",
            "p"  => "0070",
            "q"  => "0071",
            "r"  => "0072",
            "s"  => "0073",
            "t"  => "0074",
            "u"  => "0075",
            "v"  => "0076",
            "w"  => "0077",
            "x"  => "0078",
            "y"  => "0079",
            "z"  => "007A",
            "{"  => "007B",
            "|"  => "007C",
            "}"  => "007D",
            "~"  => "007E"
        ];

        public static function go(
            string $color,
            ADPFontParameters $font,
            string $string
            ): ImageString {
                $font_name = self::determine_font(
                    $font->height, 
                    $font->weight, 
                    $color
                );
                $out = new ImageString(
                    [],
                    $font->height,
                    0
                );
                self::build_characters(
                    $out,
                    $color, 
                    $font,
                    $font_name,
                    $string
                );
            return $out;
        }

        private static function determine_font(
            int $height,
            string $weight,
            string $color
            ): string {
                $out = "{$weight}_{$height}_{$color}";
                return $out;
        }

        private static function build_characters(
            ImageString &$image_string,
            string $color, 
            ADPFontParameters $font,
            string $font_name,
            string &$string
            ): void {
                if (strlen($string) == 0) {
                    return;
                } 
                $character = self::pop_string_left($string);
                if (!array_key_exists($character, self::CODES)) {
                    self::unsupported_character(
                        $image_string,
                        $color,
                        $font,
                        "[UNSUPPORTED CHARACTER]"
                    );
                }
                $image_string->font->width += $font->width + 1;
                $code = self::CODES[$character];
                $attributes = new ImageAttributes();
                $attributes->height = $font->height;
                $attributes->src = "../../../sign/font/{$font_name}_{$code}.png";
                $attributes->width = $font->width;
                $style = self::set_style();
                $attributes->core->add_style_list($style);
                $image = new Image();
                $image->attributes = $attributes;
                array_push($image_string->characters, $image->draw());
                self::build_characters(
                    $image_string,
                    $color,
                    $font,
                    $font_name,
                    $string
                );
                return;
        }

        private static function set_style(): array {
            $style = [
                "margin-right: 1px;",
                "margin-bottom: 1px;"
            ];
            return $style;
        }

        private static function unsupported_character(
            ImageString &$image_string,
            string $color,
            ADPFontParameters $font,
            string $string
            ) {
                $message = self::go(
                    $color,
                    $font,
                    $string
                );
                foreach ($message->characters as $key => $value) {
                    $image_string->font->width += $font->width + 1;
                    array_push($image_string->characters, $value);
                }
                return;
        }

        private static function pop_string_left(&$string): string {
            $out = substr($string, 0, 1);
            $string = substr($string, 1);
            return $out;
        }

    }

?>