<?php


    require_once('HTMLElementAttributes.php');  


    /** FormAttributes
     * @property ?string accept
     * @property ?string accept_charset
     * @property ?string action
     * @property ?string autocapitalize
     * @property ?string autocomplete
     * @property ?string enctype
     * @property ?string method
     * @property ?string name
     * @property ?string novalidate
     * @property ?string rel
     * @property ?string target
     * 
     */
    class FormAttributes extends HTMLElementAttributes{
    
        public function __construct(
            ?string $accept = null,
            ?string $accept_charset = null,
            ?string $action = null,
            ?string $autocapitalize = null,
            ?string $autocomplete = null,
            ?string $enctype = null,
            ?string $method = null,
            ?string $name = null,
            ?string $novalidate = null,
            ?string $rel = null,
            ?string $target = null
            ){
                parent::__construct();
                $this->accept = $accept;
                $this->accept_charset = $accept_charset;
                $this->action = $action;
                $this->autocapitalize = $autocapitalize;
                $this->autocomplete = $autocomplete;
                $this->enctype = $enctype;
                $this->method = $method;
                $this->name = $name;
                $this->novalidate = $novalidate;
                $this->rel = $rel;
                $this->target = $target;
                return;
        }

    }


?>