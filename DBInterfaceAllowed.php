<?php

    require_once('DBInterfaceAllowedBackgroundColor.php');
    require_once('DBInterfaceAllowedFlash.php');
    require_once('DBInterfaceAllowedFontSize.php');
    require_once('DBInterfaceAllowedFontWeight.php');
    require_once('DBInterfaceAllowedForegroundColor.php');
    require_once('DBInterfaceAllowedHorizontalAlignment.php');
    require_once('DBInterfaceAllowedMode.php');
    require_once('DBInterfaceAllowedScrollSpeed.php');
    require_once('DBInterfaceAllowedText.php');
    require_once('DBInterfaceAllowedVerticalAlignment.php');

    /**
     * 
     * @property DBInterfaceAllowedBackgroundColor $background_color
     * @property DBInterfaceAllowedForegroundColor $foreground_color
     * @property DBInterfaceAllowedFlash $flash
     * @property DBInterfaceAllowedFontSize $font_size
     * @property DBInterfaceAllowedFontWeight $font_weight
     * @property DBInterfaceAllowedHorizontalAlignment $horizontal_alignment
     * @property DBInterfaceAllowedMode $mode
     * @property DBInterfaceAllowedScrollSpeed $scroll_speed
     * @property DBInterfaceAllowedText $text
     * @property DBInterfaceAllowedVerticalAlignment $vertical_alignment
     */
    class DBInterfaceAllowed{

        public $background_color;
        public $foreground_color;
        public $flash;
        public $font_size;
        public $font_weight;
        public $horizontal_alignment;
        public $mode;
        public $scroll_speed;
        // public $text;
        public $vertical_alignment;

        public function __construct(DBInterfaceAllowedBackgroundColor $background_color,
        DBInterfaceAllowedForegroundColor $foreground_color,
         DBInterfaceAllowedFlash $flash, 
         DBInterfaceAllowedFontSize $font_size,
         DBInterfaceAllowedFontWeight $font_weight,
         DBInterfaceAllowedHorizontalAlignment $horizontal_alignment,
         DBInterfaceAllowedMode $mode,
         DBInterfaceAllowedScrollSpeed $scroll_speed,
         // DBInterfaceAllowedText $text,
         DBInterfaceAllowedVerticalAlignment $vertical_alignment
        ){
            $this->background_color = $background_color;
            $this->foreground_color = $foreground_color;
            $this->flash = $flash;
            $this->font_size = $font_size;
            $this->font_weight = $font_weight;
            $this->horizontal_alignment = $horizontal_alignment;            
            $this->mode = $mode;
            $this->scroll_speed = $scroll_speed;
            // $this->text = $text;
            $this->vertical_alignment = $vertical_alignment;
        }
    }

?>