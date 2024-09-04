<?php


    require_once("ContentDivision.php");
    require_once("ContentDivisionAttributes.php");
    require_once("Span.php");
    require_once("SpanAttributes.php");


    /**
     * @property array[Span] $format_segments array of Span objects
     * @property int $height row height in pixels (largest character height + 1)
     * @property ContentDivision $row_host 
     * @property int $width row width in pixels 
     */
    class ADPSignRow {

        public array $format_segments;
        public int $height;
        public ContentDivision $row_host;
        public int $width;

        public function __construct(
            ?int $height = null,
            ?int $width = null
            ){
                $this->height = $height;
                $this->width = $width;

                return;
        }

        public function draw() {
            $div
        }

    }


?>