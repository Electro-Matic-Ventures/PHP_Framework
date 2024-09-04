<?php


    /**
     * @property string $foreground_color
     * @property string $background_color
     * @property string $flash
     * @property string $text
     */
    class ADPInterfaceSegment
    {

        public $foreground_color;
        public $background_color;
        public $flash;
        public $text;

        public function __construct(
            string $foreground_color,
            string $background_color,
            string $flash,
            string $text
        )
        {
            $this->foreground_color = $foreground_color;
            $this->background_color = $background_color;
            $this->flash = $flash;
            $this->text = $text;
        }
    }

    ?>