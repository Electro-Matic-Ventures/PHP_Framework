<?php

    require_once('HTMLElementAttributes.php');
    
    /**
     * TableTDAttributes
     * @property string $colspan
     * @property string $rowspan
     */
    class TableTDAttributes extends HTMLElementAttributes
    {
        
        public ?string $colspan;
        public ?string $rowspan;

        public function __construct(
            ?string $colspan = null,
            ?string $rowspan = null
            ){
                parent::__construct();
                $this->colspan = $colspan;
                $this->rowspan = $rowspan;
                return;
        }
       
    }


?>