<?php


    require_once("Utilities.php");


    /**
     * @property array[SignInterfaceSegments] $segments
     */
    Class SignInterfaceHoldGroup{

        public $holdgroup_id;
        public $row_id;
        public $character_count;
        public array $segments;
        
        public function __construct(
            $holdgroup_id, 
            $row_id, 
            ?array $segments = null
            ){
                $this->holdgroup_id = $holdgroup_id;
                $this->row_id = $row_id;
                $this->character_count = $this->character_counter($segments);
                $this->segments = $segments;
                return;
        }

        private function character_counter(array $segments): int {
            $character_count = 0;
            foreach($segments as $key=>$segment) {
                $character_count += strlen($segment->text); 
            }
            return $character_count;
        }

    }

?>