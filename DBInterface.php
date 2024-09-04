<?php


    require_once('DBInterfaceDefaults.php');
    require_once('DBInterfaceSignDimensions.php');
    require_once('InterfaceSettingsIPSelf.php');
    require_once('DBInterfaceFile.php');
    require_once('DBInterfaceScreenFormatting.php');
    require_once('DBInterfaceRow.php');
    require_once('DBInterfaceSegment.php');


    /**
     * data class for the table interface to application
     * 
     * @property DBInterfaceDefaults $defaults
     * @property DBInterfaceSignDimensions $sign_dimensions
     * @property InterfaceSettingsIPSelf $sign_ip
     * @property DBInterfaceFile $files
     * @property DBInterfaceScreenFormatting $screen_formatting
     * @property array[DBInterfaceRow] $rows
     * @property array[DBInterfaceSegment] $segments
     */

    Class DBInterface{

        public $defaults;
        public $sign_dimensions;
        public $sign_ip;
        public $file;
        public $screen_formatting;
        public $rows;
        public $segments;
        
        public function __construct(
            $defaults = null,
            $sign_dimensions = null,
            $sign_ip = null,
            $file = null,
            $screen_formatting = null,
            $rows = null,
            $segments = null
        )
        {
            $this->defaults = $defaults;
            $this->sign_dimensions = $sign_dimensions;
            $this->sign_ip = $sign_ip;
            $this->file = $file;
            $this->screen_formatting = $screen_formatting;
            $this->rows = $rows;
            $this->segments = $segments;
        }

    }


?>