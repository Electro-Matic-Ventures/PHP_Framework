<?php


    /**
     * @property string $font_weight
     * @property string $font_size
     * @property string $horizontal_alignment
     * @property $segments
     */
    class ADPInterfaceRow
    {

        public $font_weight;
        public $font_size;
        public $horizontal_alignment;
        public $segments;

        public function __construct(
            string $font_weight,
            string $font_size,
            string $horizontal_alignment,
            string $segments
        )
        {
            $this->font_weight = $font_weight;
            $this->font_size = $font_size;
            $this->horizontal_alignment = $horizontal_alignment;
            if (is_null($segments))
            {
                $this->segments = array();
            } else{
                $this->segments = $segments;
            }
        }
    }

    ?>