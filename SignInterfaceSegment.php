<?php
//* @property array[SignInterfaceRow] $rows
Class SignInterfaceSegment{

    public $segment_id;
    public $holdgroup_id;
    public $row_id;
    public $file_id;
    public $number;
    public $foreground_color;
    public $background_color;
    public $flash;
    public $text;
    
    public function __construct(DBInterface $Data = null, $segment_index, $text, $holdgroup_id){

        $this->segment_id = $Data->segments[$segment_index]->segment_id;
        $this->holdgroup_id = $holdgroup_id;
        $this->row_id = $Data->segments[$segment_index]->row_id;
        $this->file_id = $Data->segments[$segment_index]->file_id;
        $this->number = $Data->segments[$segment_index]->number;
        $this->foreground_color = self::default_value(
            $Data->segments[$segment_index]->foreground_color,
            $Data->defaults->foreground_color
        );
        $this->background_color = self::default_value(
            $Data->segments[$segment_index]->background_color,
            $Data->defaults->background_color
        );
        $this->flash = self::default_value(
            $Data->segments[$segment_index]->flash,
            $Data->defaults->flash
        );
        $this->text = $text;
    }

    private function default_value($db, $default) {
        if (is_null($db)) {
            return $default;
        }
        return $db;
    }

}

?>