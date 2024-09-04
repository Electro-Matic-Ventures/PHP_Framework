<?php


    /**
     * @property SignDataFile $file
     * @property array<SignDataRow> $rows
     */
    class ADPInterface
    {

        public $file;
        public $rows;

        public function __construct(
            string $file,
            string $rows
        )
        {
            $this->file = $file;
            if (is_null($rows))
            {
                $this->rows = array();
            } else {
                $this->rows = $rows;
            }
        }
    }

    ?>