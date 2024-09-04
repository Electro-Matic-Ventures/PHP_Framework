<?php

    
    
    /**
     * HTMLElement
     * @method string generate_start_tag(string $type, object $default_attributes) creates html start tag including all non-default attributes
     */
    class HTMLElement{

        public function generate_start_tag($type, $default_attributes)
        {
            $start_tag = '<'.$type.' ';
            $start_tag .= $this->append_attributes($this->attributes, $default_attributes);
            $start_tag = substr($start_tag, 0, -1);
            return $start_tag .= '>';
        }

        private function append_attributes($attributes, $default_attributes)
        {
            $text = '';
            foreach($attributes as $key=>$attribute){
                if($attribute==$default_attributes->$key){
                    continue;
                }
                if(is_object($attribute)){
                    $text .= $this->append_attributes($attribute, $default_attributes->$key); 
                    continue;
                }
                $text .= $this->add_attribute($key, $attribute);
            }
            return $text;
        }

        private function add_attribute($key, $value): string 
        {
            switch ($key) {
                case "hidden":
                    if ($value) {
                        return $key.' ';
                    }
                    break;
                case "selected":
                    if ($value) {
                        return $key.' ';
                    }
                    break;
                case "default":
                    if ($value) {
                        return $key.' ';
                    }
                default:
                    return $key.'="'.$value.'" ';
            }
        }

        public function add_to_class($value)
        {
            $this->attributes->core->class =$value;
            return;
        }

        public function add_class_list(?array $list){
            if(is_null($list)){
                return;
            }
            foreach($list as $key => $value){
                $this->add_to_class($value);
            }
            return;
        }

        public function add_to_style($value)
        {
            $this->attributes->core->style = $value;
            return;
        }

        public function add_style_list(?array $list){
            if(is_null($list)){
                return;
            }
            foreach($list as $key => $value){
                $this->add_to_style($value);
            }
            return;
        }

    }


?>