<?php


    /**
     * @property int $height
     * @property string $weight
     * @property int $width
     */
    class ADPFontParameters {

        public ?int $height;
        public ?string $weight;
        public ?int $width;
        
        public function __construct(
            ?int $height,
            ?string $weight,
            ?int $width
        ){
            $this->height = $height;
            $this->weight = $weight;
            $this->width = $width;
            return;
        }

    }

?>