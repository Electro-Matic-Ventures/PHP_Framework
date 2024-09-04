<?php

    require_once("ADPFontParameters.php");

    class Fonts {
        
        private static $instance;
        private static $normal;
        private static $bold;

        public function __construct() {
            self::$normal = [
                "5" => new ADPFontParameters(5, "normal", 5),
                "7" => new ADPFontParameters(7, "normal", 6),
                "9" => new ADPFontParameters(9, "normal", 9),
                "11" => new ADPFontParameters(11, "normal", 9),
                "14" => new ADPFontParameters(14, "normal", 8),
                "15" => new ADPFontParameters(15, "normal", 9),
                "16" => new ADPFontParameters(16, "normal", 9),
                "22" => new ADPFontParameters(22, "normal", 18),
                "24" => new ADPFontParameters(24, "normal", 16),
                "30" => new ADPFontParameters(30, "normal", 18),
                "32" => new ADPFontParameters(32, "normal", 18),
                "40" => new ADPFontParameters(40, "normal", 21),
                "64" => new ADPFontParameters(64, "normal", 34),
                "72" => new ADPFontParameters(72, "normal", 38),
                "80" => new ADPFontParameters(80, "normal", 42),
                "88" => new ADPFontParameters(88, "normal", 46)
            ];
            self::$bold = [
                "5" => new ADPFontParameters(5, "bold", 7),
                "11" => new ADPFontParameters(11, "bold", 9),
                "14" => new ADPFontParameters(14, "bold", 10),
                "15" => new ADPFontParameters(15, "bold", 10),
                "16" => new ADPFontParameters(16, "bold", 12),
                "22" => new ADPFontParameters(22, "bold", 18),
                "30" => new ADPFontParameters(30, "bold", 18),
                "32" => new ADPFontParameters(32, "bold", 18),
                "40" => new ADPFontParameters(40, "bold", 21)
            ];
        }

        public static function get_instance() {
            if(is_null(self::$instance)) {
                self::$instance = new Fonts();
            }
            return self::$instance;
        }

        public static function get(string $weight, string $size):ADPFontParameters {
            $fonts = Fonts::get_instance();
            return self::$instance::$$weight[$size];
        }

    }

?>