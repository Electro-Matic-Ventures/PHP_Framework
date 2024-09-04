<?php


    /**
     * data class for segments table interface to application
     * 
     * @property string $id
     * @property string $hold_time
     * @property string $scroll_speed
     * @property string $vertical_alignment
     * @property string $in_mode
     * @property string $out_mode
     * @property string $font_weight
     * @property string $font_size
     * @property string $horizontal_alignment
     * @property string $foreground_color
     * @property string $background_color
     * @property string $flash
     * @property string $text
     */
    class SignInterfaceDefaults{

        public $id;
        public $hold_time;
        public $scroll_speed;
        public $vertical_alignment;
        public $in_mode;
        public $out_mode;
        public $font_weight;
        public $font_size;
        public $horizontal_alignment;
        public $foreground_color;
        public $background_color;
        public $flash;
        public $text;
        
        public function __construct(DBInterface $data){
            $this->id = $data->defaults->id;
            $this->hold_time = $data->defaults->hold_time;
            $this->scroll_speed = $data->defaults->scroll_speed;
            $this->vertical_alignment = $data->defaults->vertical_alignment;
            $this->in_mode = $data->defaults->in_mode;
            $this->out_mode = $data->defaults->out_mode;
            $this->font_weight = $data->defaults->font_weight;
            $this->font_size = $data->defaults->font_size;
            $this->horizontal_alignment = $data->defaults->horizontal_alignment;
            $this->foreground_color = $data->defaults->foreground_color;
            $this->background_color = $data->defaults->background_color;
            $this->flash = $data->defaults->flash;
            $this->text = $data->defaults->text;
            return;
        }

    }


?>