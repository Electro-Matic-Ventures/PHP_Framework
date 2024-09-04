<?php

    require_once('HTMLCoreAttributes.php');
    require_once('HTMLEventAttributes.php');
        
    /**
     * @property HTMLCoreAttributes $core
     * @property HTMLEventAttributes $events
     * @method void add_to_class(string $add_this) adds the specified text to a class attribute string. adds a preceeding space where required.
     */
    class HTMLElementAttributes{

        public $core;
        public $events;

        public function __construct()
        {
            $this->core = new HTMLCoreAttributes(null, null, null, null);
            $this->events = new HTMLEventAttributes(null, null, null, null, null, null);
            return;
        }

    }


?>