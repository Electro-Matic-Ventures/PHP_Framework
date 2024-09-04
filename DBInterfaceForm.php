<?php

    require_once('DBInterfaceDefaults.php');
    require_once('DBInterfaceAllowed.php');

    /**
     * 
     * @property DBInterfaceDefaults $defaults
     * @property DBInterfaceAllowed $allowed
     */
    class DBInterfaceForm{

        public $defaults;
        public $allowed;

        public function __construct(DBInterfaceDefaults $defaults, DBInterfaceAllowed $allowed){
            $this->defaults = $defaults;
            $this->allowed = $allowed;
        }
    }

?>