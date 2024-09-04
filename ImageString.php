<?php


    require_once("ADPFontParameters.php");


    /**
     * @property array[string] $characters - the results of Image.draw() for each character in a string.
     * @property ADPFontParameters $font
     */
    class ImageString {
        
        public array $characters;
        public ADPFontParameters $font;

        public function __construct(
            ?array $characters = null,
            ?int $height = null,
            ?int $width = null
        ){
            $this->characters = $characters;
            $this->font = new ADPFontParameters(
                $height,
                null,
                $width
            );
            return;
        }

    }


?>