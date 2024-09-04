<?php


    require_once('HTMLElementAttributes.php');    
    
    /**
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
     * @property string $alt 
     * @property string $crossorigin allowed: ["anonymous, "use-credentials"]
     * @property string $decoding allowed: ["sync", "async", "auto"]
     * @property string $elementtiming
     * @property string $fetchpriority allowed: ["high", "low", "auto"]
     * @property string $height integer with no units. e.g. 3
     * @property string $ismap bool as string
     * @property string $loading allowed: ["eager", "lazy"]
     * @property string $referrerpolicy
     * @property string $sizes
     * @property string $src
     * @property string $srcset
     * @property string $width integer with no units. e.g. 5
     * @property string $usemap
     */
    class ImageAttributes extends HTMLElementAttributes
    {
    
        public function __construct(
            $alt = null,
            $crossorigin = null,
            $decoding = null,
            $elementtiming = null,
            $fetchpriority = null,
            $height = null,
            $ismap = null,
            $loading = null,
            $referrerpolicy = null,
            $sizes = null,
            $src = null,
            $srcset = null,
            $width = null,
            $usemap = null
        )
        {
            parent::__construct();
            $this->alt = $alt;
            $this->crossorigin = $crossorigin;
            $this->decoding = $decoding;
            $this->elementtiming = $elementtiming;
            $this->fetchpriority = $fetchpriority;
            $this->height = $height;
            $this->ismap = $ismap;
            $this->loading = $loading;
            $this->referrerpolicy = $referrerpolicy;
            $this->sizes = $sizes;
            $this->src = $src;
            $this->srcset = $srcset;
            $this->width = $width;
            $this->usemap = $usemap;
            return;
        }
       
    }


?>