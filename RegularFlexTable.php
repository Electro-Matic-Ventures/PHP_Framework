<?php


    require_once("ContentDivision.php");
    require_once("Paragraph.php");


    class RegularFlexTable {

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
            $table = new ContentDivision();
            $table->add_to_class("flex_table");
            $table->attributes->core->id = $id;
            $table->contained = $contents;
            return $table->draw();
        }

        private function draw_header(){
            $row = $this->draw_row($this->header);
            $row->add_to_class("header");
            return $row->draw();
        }

        private function draw_body(){
            $contents = '';
            foreach($this->data as $key => $value){
                $contents .= $this->draw_row($value)->draw();
            }
            return $contents;
        }

        private function draw_row(array $data){
            $row = new ContentDivision();
            $row->add_to_class("flex_row");
            $contents = '';
            foreach($data as $key => $value){
                $cell = new Paragraph();
                $cell->add_to_class("flex_cell");
                $cell->text = $value;
                $contents .= $cell->draw();
            }
            $row->contained = $contents;
            return $row;
        }
        

    }


?>