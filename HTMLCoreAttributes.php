<?php


    
    /**
     * @property $class
     * @property $id
     * @property $style
     * @property $hidden
     * @method void add_to_class(string $value) adds $value to element's class attribute. if class is blank, $value will be added as the first class element
     * @method void add_to_style(string $value) adds $value to element's style attribute. if style is blank, $value will be added as the first style element
     */
    class HTMLCoreAttributes
    {

        public $class;
        public $id;
        public $style;
        public $hidden;

        public function __construct
        (
            $class,
            $id,
            $style,
            $hidden
        )
        {
            $this->class = $class;
            $this->id = $id;
            $this->style = $style;
            $this->hidden = $hidden;
        }

    }

    
?>