<?php


    require_once('ContentDivision.php');
    require_once('ContentDivisionAttributes.php');
    require_once('Navigation.php');
    require_once('NavigationAttributes.php');
    require_once('Anchor.php');
    require_once('AnchorAttributes.php');
    require_once("Paragraph.php");
    require_once("ParagraphAttributes.php");


    class SideNav {

        public static function go(string $path='/var/ADP_Gateway/html/user_interface/applications'){
            $file_nodes = array_slice(scandir($path), 2); 
            $results["contents"] = ""; 
            $results["return_from_base"] = false;
            foreach($file_nodes as $key => $value){
                $new_path = "$path/$value";
                if(is_dir($new_path)){
                    $these_results = self::go($new_path);
                    $results["contents"] .= $these_results["contents"];
                    if($these_results["return_from_base"]){
                        $results["return_from_base"] = true;
                    }
                    continue;
                }
                if($value == "index.php"){
                    $results["contents"] .= SideNav::generate_link($path);
                    $results["return_from_base"] = true;
                    return $results;
                }
            }
            if($results["return_from_base"]){
                $results["return_from_base"] = false;
                return $results;
            }
            return $results;
        }

        private static function generate_link(string $path){ 
            $a = new Anchor();
            $a->text = SideNav::get_text($path);
            $a->attributes->href = SideNav::get_link($path);
            $a->add_class_list(["interactive"]);
            $p = new Paragraph();
            $p->text = $a->draw();
            return $p->draw();
        }
    
        private static function get_link(string $path){
            $target = explode("/", $path);
            $target = array_slice($target, 4);
            $target = join("/", $target);
            $target = "/".$target;
            return $target;
        }

        private static function get_text(string $path) {
            $target = substr($path,strrpos($path,"/",-1)+1);
            $target = str_replace("_", " ", $target);
            $target = trim($target);
            $target = ucwords($target);
            return $target;
        }

    }


?>