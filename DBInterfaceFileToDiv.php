<?php


    require_once('ContentDivision.php');
    require_once('DBInterfaceRowToDiv.php');
    require_once('HoldGroup.php');
    require_once('StylePadding.php');


    Class DBInterfaceFileToDiv{

        public function go(DBInterface $data){
            $div = new ContentDivision();
            $div->attributes->core->id = "sign";
            $div->attributes->core->add_to_style($this->set_style($data));
            $div->contained = $this->concat_rows($data);
            return $div->draw();
        }

        private function set_style(DBInterface $data){
            $style = $this->dimensions($data->sign_parameters);
            $style .= "display:flex; ";
            $style .= "flex-direction:column; ";
            $style .= $this->set_vertical_alignment($data);
            $style .= "background-color:#000000; ";
            if($data->file->mode=="scroll"){
                $style .= "white-space:nowrap; ";
            }
            return trim($style);
        }

        private function dimensions(DBInterfaceSignParameters $interface){
            return "height:{$interface->height}px; width:{$interface->width}px; ";
        }

        private function set_vertical_alignment(DBInterface $data){
            $alignment =$this->style_selector(
                $data->defaults->vertical_alignment, 
                $data->file->vertical_alignment
            );
            switch($alignment){
                case "top":
                    return "justify-content:flex-start; ";
                case "middle":
                    return "justify-content:center; ";
                case "fill":
                    return "justify-content:space-around; ";
                case "bottom":
                    return "justify-content:flex-end; ";
            }
            return "justify-content:center; ";
        }

        private function style_selector($default, $value){
            if (is_null($value)){
                return $default;
            }
            return $value;
        }

        private function concat_rows(DBInterface $data){ 
            $complete = "";
            if($data->file->mode == 'hold'){
                for($i = 0; $i < count($data->rows); $i++){
                    $HoldGroup = new HoldGroup();

                    ## currently passing a cloned value of $data
                    $complete .= $HoldGroup->go(clone $data, $i);
                }

                return $complete;
            }

            for($i = 0; $i < count($data->rows); $i++){
                $DBInterfaceRowToTR = new DBInterfaceRowToDiv();
                $complete .= $DBInterfaceRowToTR->go($data, $i);
            }
            return $complete;
        }

    }


?>