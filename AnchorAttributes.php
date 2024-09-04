<?php


    require_once('HTMLElementAttributes.php');  


    /** AnchorAttributes
     * @property ?string attributionsrc
     * @property ?string download
     * @property ?string href
     * @property ?string hreflang
     * @property ?string referrerpolicy
     * @property ?string rel
     * @property ?string target
     * @property ?string type
     * 
     */
    class AnchorAttributes extends HTMLElementAttributes{
    
        public function __construct(
            ?string $attributionsrc = null,
            ?string $download = null,
            ?string $href = null,
            ?string $hreflang = null,
            ?string $ping = null,
            ?string $referrerpolicy = null,
            ?string $rel = null,
            ?string $target = null,
            ?string $type = null
            ){
                parent::__construct();
                $this->attributionsrc = $attributionsrc;
                $this->download = $download;
                $this->href = $href;
                $this->hreflang = $hreflang;
                $this->ping = $ping;
                $this->referrerpolicy = $referrerpolicy;
                $this->rel = $rel;
                $this->target = $target;
                $this->type = $type;
                return;
        }

    }


?>