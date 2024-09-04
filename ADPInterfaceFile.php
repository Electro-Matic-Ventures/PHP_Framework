<?php


    /**
     * @property string $hold
     * @property string $scroll_speed
     * @property string $vertical_alignment
     * @property string $mode
     */
    class ADPInterfaceFile
    {

        public $hold;
        public $scroll_speed;
        public $vertical_alignment;
        public $mode;

        public function __construct(
            string $hold,
            string $scroll_speed,
            string $vertical_alignment,
            string $mode
        )
        {
            $this->hold = $hold;
            $this->scroll_speed = $scroll_speed;
            $this->vertical_alignment = $vertical_alignment;
            $this->mode = $mode;
        }
    }

    ?>