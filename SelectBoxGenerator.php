<?php


    require_once('SelectAttributes.php');
    require_once('LabelAttributes.php');
    require_once('OptionAttributes.php');
    require_once('Select.php');
    require_once('Label.php');
    require_once('Option.php');


    class SelectBoxGenerator{

        public SelectAttributes $select_attributes;
        public LabelAttributes $label_attributes;
        public OptionAttributes $option_attributes;
        public array $options;
        
        public function __construct(){
            $this->select_attributes = new SelectAttributes();
            $this->label_attributes = new LabelAttributes();
            $this->option_attributes = new OptionAttributes();
            $this->options = array();
            return;
        }

        public function draw(SelectBoxInterface $interface){
            $return = $this->create_label($interface);
            $return .= $this->create_select($interface);
            return $return;
        }

        private function create_select(SelectBoxInterface $interface){
            $select = new Select();
            $select->attributes = $this->select_attributes;
            $select->attributes->name = $interface->name;
            $select->attributes->core->id = $interface->id;
            $select->contained = $this->option_array($interface);
            return $select->draw();
        }

        private function create_label(SelectBoxInterface $interface){
            $label = new Label();
            $label->attributes = $this->label_attributes;
            $label->attributes->for = $interface->id;
            $label->contained = $interface->label;
            return $label->draw();
        }

        private function option_array(SelectBoxInterface $interface){
            $return_str = "";
            foreach ($interface->options as $key=>$value){
                $return_str .= $this->create_option(
                    $value, 
                    $key, 
                    $interface->default
                );
            }
            return $return_str;
        }

        private function create_option($value, $inner_text, $default){
            $option = new Option();
            $option->attributes->selected = $default == $inner_text;
            $option->attributes->value = $value->value;
            $option->contained = $inner_text;
            return $option->draw();
        }
    
    }

?>