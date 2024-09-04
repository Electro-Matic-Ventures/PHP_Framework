<?php


    require_once("DataclassParent.php");
    require_once("Utilities.php");

    /**
     * @property string $black = "black";
     * @property string $red = "red";
     * @property string $green = "green";
     * @property string $yellow = "yellow";
     * @property string $mix_1 = "mix 1";
     * @property string $mix_2 = "mix 2";
     * @property string $mix_3 = "mix 3";
     * @property string $mix_4 = "mix 4";
     * @property string $blue = "blue";
     * @property string $white = "white";
     */
    class ADPConstantsColors extends DataclassParent {

        public string $black = "black";
        public string $red = "red";
        public string $green = "green";
        public string $yellow = "yellow";
        public string $mix_1 = "mix 1";
        public string $mix_2 = "mix 2";
        public string $mix_3 = "mix 3";
        public string $mix_4 = "mix 4";
        public string $blue = "blue";
        public string $white = "white";

    }


    /**
     * @property string $d = "D"
     * @property string $e = "e"
     */
    class ADPConstantsDrives extends DataclassParent{
        
        public string $D = "D";
        public string $E = "E";

    }


    /**
     * @property string $off = "off";
     * @property string $on = "on";
     */
    class ADPConstantsFlashes extends DataclassParent {

        public string $off = "off";
        public string $on = "on";

    }


    /**
     * @property string $five = '5'
     * @property string $seven = '7'
     * @property string $nine = '9'
     * @property string $eleven = '11'
     * @property string $fourteen = '14'
     * @property string $fifteen = '15'
     * @property string $sixteen = '16'
     * @property string $twenty_two = '22'
     * @property string $twenty_four = '24'
     * @property string $thirty = '30'
     * @property string $thirty_two = '32'
     * @property string $forty = '40'
     */
    class ADPConstantsFontSizes extends DataclassParent {
        public string $five = '5';
        public string $seven = '7';
        public string $nine = '9';
        public string $eleven = '11';
        public string $fourteen = '14';
        public string $fifteen = '15';
        public string $sixteen = '16';
        public string $twenty_two = '22';
        public string $twenty_four = '24';
        public string $thirty = '30';
        public string $thirty_two = '32';
        public string $forty = '40';
    }


    /**
     * @property string $bold = "bold"
     * @property string $normal = "normal"
     */
    class ADPConstantsFontWeights extends DataclassParent {
        
        public string $bold = "bold";
        public string $normal = "normal";

    }


    /**
     * @property int $min = 1;
     * @property int $max = 99;
     */
    class ADPConstantsHoldTimes extends DataclassParent {

        public int $min = 1;
        public int $max = 99;

    }


    /**
     * @property string $center = "center"
     * @property string $left = "left"
     * @property string $right = "right"
     */
    class ADPConstantsHorizontalAlignments extends DataclassParent {

        public string $center = "center";
        public string $left = "left";
        public string $right = "right";

    }


    /**
     * @property string $scroll = "a"
     * @property string $hold = "b"
     * @property string $flash = "c"
     * @property string $random = "d"
     * @property string $move_left = "e"
     * @property string $move_right = "f"
     * @property string $scroll_out_left = "g"
     * @property string $scroll_out_right = "h"
     * @property string $move_up = "i"
     * @property string $move_down = "j"
     * @property string $scroll_out_to_center = "k"
     * @property string $unveil_up = "l"
     * @property string $unveil_down = "m"
     * @property string $unveil_in = "n"
     * @property string $unveil_up_in = "o"
     * @property string $unveil_up_out = "p"
     * @property string $splice_across = "q"
     * @property string $splice_vertically = "r"
     * @property string $fall_left = "s"
     * @property string $fall_right = "t"
     * @property string $venetian_horizontal = "u"
     * @property string $venetian_vertical = "v"
     * @property string $rain = "w"
     * @property string $materialize = "x"
     * @property string $twinkle = "z"
     * @property string $squiggle = "1"
     * @property string $radar = "2"
     * @property string $fan_open = "3"
     * @property string $fan_close = "4"
     * @property string $rotate_right = "5"
     * @property string $rotate_left = "6"
     * @property string $center_to_corner = "7"
     * @property string $corner_to_center = "8"
     * @property string $center_to_all_sides = "9"
     * @property string $all_sides_to_center = "A"
     * @property string $four_blocks_to_corners = "B"
     * @property string $four_blocks_to_center = "C"
     * @property string $four_blocks_out = "D"
     * @property string $four_blocks_in = "E"
     * @property string $left_top_in = "F"
     * @property string $right_top_in = "G"
     * @property string $left_bottom_in = "H"
     * @property string $right_bottom_in = "I"
     * @property string $left_top_diagonal = "J"
     * @property string $right_top_diagonal = "K"
     * @property string $left_bottom_diagonal = "L"
     * @property string $right_bottom_diagonal = "M"
     * @property string $left_to_right_down_corner = "N"
     * @property string $right_to_left_down_corner = "O"
     * @property string $left_to_right_up_corner = "P"
     * @property string $right_to_left_up_corner = "Q"
     * @property string $grow_up = "R"
     */
    class ADPConstantsModes extends DataclassParent {

        public string $scroll = "a";
        public string $hold = "b";
        public string $flash = "c";
        public string $random = "d";
        public string $move_left = "e";
        public string $move_right = "f";
        public string $scroll_out_left = "g";
        public string $scroll_out_right = "h";
        public string $move_up = "i";
        public string $move_down = "j";
        public string $scroll_out_to_center = "k";
        public string $unveil_up = "l";
        public string $unveil_down = "m";
        public string $unveil_in = "n";
        public string $unveil_up_in = "o";
        public string $unveil_up_out = "p";
        public string $splice_across = "q";
        public string $splice_vertically = "r";
        public string $fall_left = "s";
        public string $fall_right = "t";
        public string $venetian_horizontal = "u";
        public string $venetian_vertical = "v";
        public string $rain = "w";
        public string $materialize = "x";
        public string $twinkle = "z";
        public string $squiggle = "1";
        public string $radar = "2";
        public string $fan_open = "3";
        public string $fan_close = "4";
        public string $rotate_right = "5";
        public string $rotate_left = "6";
        public string $center_to_corner = "7";
        public string $corner_to_center = "8";
        public string $center_to_all_sides = "9";
        public string $all_sides_to_center = "A";
        public string $four_blocks_to_corners = "B";
        public string $four_blocks_to_center = "C";
        public string $four_blocks_out = "D";
        public string $four_blocks_in = "E";
        public string $left_top_in = "F";
        public string $right_top_in = "G";
        public string $left_bottom_in = "H";
        public string $right_bottom_in = "I";
        public string $left_top_diagonal = "J";
        public string $right_top_diagonal = "K";
        public string $left_bottom_diagonal = "L";
        public string $right_bottom_diagonal = "M";
        public string $left_to_right_down_corner = "N";
        public string $right_to_left_down_corner = "O";
        public string $left_to_right_up_corner = "P";
        public string $right_to_left_up_corner = "Q";
        public string $grow_up = "R";

    }


    /**
     * @property int $min = 1
     * @property int $max = 9
     */
    class ADPConstantsLineSpacings extends DataclassParent {

        public int $min = 0;
        public int $max = 9; 

    }


    /**
     * @property string $slowest = "slowest"
     * @property string $slow = "slow"
     * @property string $normal = "normal"
     * @property string $fast = "fast"
     * @property string $fastest = "fastest"
     */
    class ADPConstantsScrollSpeeds extends DataclassParent {

        public string $slowest = "slowest";
        public string $slow = "slow";
        public string $normal = "normal";
        public string $fast = "fast";
        public string $fastest = "fastest";

    }  
    

    /**
     * 
     */
    class ADPConstantsVerticalAlignments extends DataclassParent {

        public string $bottom = "bottom";
        public string $middle = "middle";
        public string $fill = "fill";
        public string $top = "top";
    }
    

    /**
     * @property string $off = "off";
     * @property string $on = "on";
     */
    class ADPConstantsWraps extends DataclassParent {

        public string $off = "off";
        public string $on = "on";

    }


?>