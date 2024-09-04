<?php

        
    /**
     * @property string $onload
     * @property string $onchange
     * @property string $onfocus
     * @property string $onselect
     * @property string $onafterprint
     * @property string $onclick
     */
    class HTMLEventAttributes{
        
        public $onload;
        public $onchange;
        public $onfocus;
        public $onselect;
        public $onafterprint;
        public $onclick;

        public function __construct(
            $onload,
            $onchange,
            $onfocus,
            $onselect,
            $onafterprint,
            $onclick
        ){
            $this->onload = $onload;
            $this->onchange = $onchange;
            $this->onfocus = $onfocus;
            $this->onselect = $onselect;
            $this->onafterprint = $onafterprint;
            $this->onclick = $onclick;
            return;
        }

    }


?>