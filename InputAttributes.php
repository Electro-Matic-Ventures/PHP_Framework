<?php


    require_once('HTMLElementAttributes.php');  


    /** InputAttributes
     * @property ?string $accept
     * @property ?string $alt
     * @property ?string $autocomplete
     * @property ?string $capture
     * @property ?string $checked
     * @property ?string $dirname
     * @property ?string $disabled
     * @property ?string $form
     * @property ?string $formaction
     * @property ?string $formenctype
     * @property ?string $formmethod
     * @property ?string $formvalidate
     * @property ?string $formtarget
     * @property ?string $height
     * @property ?string $list
     * @property ?string $max
     * @property ?string $maxlength
     * @property ?string $min
     * @property ?string $minlength
     * @property ?string $multiple
     * @property ?string $name
     * @property ?string $pattern
     * @property ?string $placeholder
     * @property ?string $popovertarget
     * @property ?string $popovertargetaction
     * @property ?string $readonly
     * @property ?string $required
     * @property ?string $size
     * @property ?string $src
     * @property ?string $step
     * @property ?string $type
     * @property ?string $value
     * @property ?string $width
     */
    class InputAttributes extends HTMLElementAttributes{
    
        public ?string $accept;
        public ?string $alt;
        public ?string $autocomplete;
        public ?string $capture;
        public ?string $checked;
        public ?string $dirname;
        public ?string $disabled;
        public ?string $form;
        public ?string $formaction;
        public ?string $formenctype;
        public ?string $formmethod;
        public ?string $formvalidate;
        public ?string $formtarget;
        public ?string $height;
        public ?string $list;
        public ?string $max;
        public ?string $maxlength;
        public ?string $min;
        public ?string $minlength;
        public ?string $multiple;
        public ?string $name;
        public ?string $pattern;
        public ?string $placeholder;
        public ?string $popovertarget;
        public ?string $popovertargetaction;
        public ?string $readonly;
        public ?string $required;
        public ?string $size;
        public ?string $src;
        public ?string $step;
        public ?string $type;
        public ?string $value;
        public ?string $width;

        public function __construct(
            ?string $accept = null,
            ?string $alt = null,
            ?string $autocomplete = null,
            ?string $capture = null,
            ?string $checked = null,
            ?string $dirname = null,
            ?string $disabled = null,
            ?string $form = null,
            ?string $formenctype = null,
            ?string $formmethod = null,
            ?string $formvalidate = null,
            ?string $formtarget = null,
            ?string $height = null,
            ?string $list = null,
            ?string $max = null,
            ?string $maxlength = null,
            ?string $min = null,
            ?string $minlength = null,
            ?string $multiple = null,
            ?string $name = null,
            ?string $pattern = null,
            ?string $placeholder = null,
            ?string $popovertarget = null,
            ?string $popovertargetaction = null,
            ?string $readonly = null,
            ?string $required = null,
            ?string $size = null,
            ?string $src = null,
            ?string $step = null,
            ?string $type = null,
            ?string $value = null,
            ?string $width = null
            ){
                parent::__construct();
                $this->accept = $accept;
                $this->alt = $alt;
                $this->autocomplete = $autocomplete;
                $this->capture = $capture;
                $this->checked = $checked;
                $this->dirname = $dirname;
                $this->disabled = $disabled;
                $this->form = $form;
                $this->formenctype = $formenctype;
                $this->formmethod = $formmethod;
                $this->formvalidate = $formvalidate;
                $this->formtarget = $formtarget;
                $this->height = $height;
                $this->list = $list;
                $this->max = $max;
                $this->maxlength = $maxlength;
                $this->min = $min;
                $this->minlength = $minlength;
                $this->multiple = $multiple;
                $this->name = $name;
                $this->pattern = $pattern;
                $this->placeholder = $placeholder;
                $this->popovertarget = $popovertarget;
                $this->popovertargetaction = $popovertargetaction;
                $this->readonly = $readonly;
                $this->required = $required;
                $this->size = $size;
                $this->src = $src;
                $this->step = $step;
                $this->type = $type;
                $this->value = $value;
                $this->width = $width;
                return;
        }

    }


?>
