<?php


    require_once('Table.php');
    require_once('TableTR.php');
    require_once('TableTD.php');


    class RegularTable {

        public $id;
        public $header;
        public $data;
        
        public function __construct(
            ?array $data = null,
            ?array $header = null,
            ?string $id = null
        ){
            if(is_null($header)){
                $this->header = array_keys($data[0]);
            }
            if(is_null($id)) {
                $this->id = "";
            } else {
                $this->id = $id;
            }
            $this->data = $data;
            return;
        }

        public function draw(bool $draw_header){
            $contents = "";
            if($draw_header){
                $contents .= $this->draw_header();
            }

            $contents .= $this->draw_body();
            return $this->draw_table($this->id, $contents);
        }

        private function draw_table(string $id, string $contents){
            $table = new Table();
            $table->attributes->core->id = $id;
            $table->contained = $contents;
            return $table->draw();
        }

        private function draw_header(){
            return $this->draw_row($this->header);
        }

        private function draw_body(){
            $contents = '';
            foreach($this->data as $key => $value){
                $contents .= $this->draw_row($value);
            }
            return $contents;
        }

        private function draw_row(array $data){
            $row = new TableTR();
            $contents = '';
            foreach($data as $key => $value){
                $cell = new TableTD();
                $cell->contained = $value;
                $contents .= $cell->draw();
            }
            $row->contained = $contents;
            return $row->draw();
        }
        

    }


?>