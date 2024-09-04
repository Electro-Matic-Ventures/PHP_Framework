<?php

    /**
     * 
     * 
     * @property string $id
     * @property string $file_id
     * @property int $number
     * @property string $font_weight
     * @property string $font_size
     * @property string $horizontal_alignment
     * @property array[SignInterfaceHoldGroup] $holdgroups
     */
    Class SignInterfaceRow{

        public $row_id;
        public $file_id;
        public $number;
        public $font_weight;
        public $font_size;
        public $horizontal_alignment;
        public $holdgroups;
        
        public function __construct(
            DBInterface $data = null, 
            $row_index, 
            $holdgroups
            ){
                $this->row_id = $data->rows[$row_index]->row_id;
                $this->file_id = $data->rows[$row_index]->file_id;
                $this->number = $data->rows[$row_index]->number;
                $this->font_weight = self::default_value(
                    $data->rows[$row_index]->font_weight, 
                    $data->defaults->font_weight
                );
                $this->font_size = self::default_value(
                    $data->rows[$row_index]->font_size,
                    $data->defaults->font_size
                );
                $this->horizontal_alignment = self::default_value(
                    $data->rows[$row_index]->horizontal_alignment,
                    $data->defaults->horizontal_alignment
                );
                $this->holdgroups = $holdgroups;
            return;
        }

        private function default_value($db, $default) {
            if (is_null($db)) {
                return $default;
            }
            return $db;
        }

    }

?>