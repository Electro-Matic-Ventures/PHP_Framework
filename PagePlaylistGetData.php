<?php


    require_once("DBIOParent.php");
    require_once("InterfaceADPFiles.php");
    require_once("InterfaceADPPlaylist.php");
    require_once("InterfaceADPSegmentFormatting.php");
    require_once("Utilities.php");


    class PagePlaylistGetData {

        private array $files;
        private array $playlist;
        private array $texts;

        public function __construct() {
            $this->files = $this->get_files();
            $this->playlist = $this->get_playlist();
            $this->texts = $this->get_texts();
            return;
        }
        
        public function get_texts_not_in_playlist(): array {
            $data = [];
            foreach($this->texts as $file_id=>$text) {
                if(!in_array($file_id, $this->playlist)) {
                    $data[$file_id] = $text;
                }
            }
            return $data;
        }

        public function get_texts_in_playlist(): array {
            $data = [];
            foreach($this->playlist as $key=>$file_id) {
                if (is_null($file_id)) {
                    continue;
                }
                $data[$file_id] = $this->texts[$file_id];
            }
            return $data;
        }

        private function get_files(): array {
            $files = DBIOParent::read_all_rows_exclude_value(
                "adp",
                "files",  
                "folder",
                "S",
                new InterfaceADPFiles()
            );
            $file_ids = [];
            foreach ($files as $key=>$value) {
                array_push($file_ids, $value->file_id);
            }
            return $file_ids;
        }

        private function get_playlist(): array {        
            $playlist = DBIOParent::read_all_rows(
                "adp",
                "playlist",
                new InterfaceADPPlaylist()
            );
            $ids = [];
            foreach ($playlist as $key=>$value) {
                array_push($ids, $value->file_id);
            }
            return $ids;
        }
        
        /**
         * gets text by file_id, returns in array format [file_id] = text
         */
        private function get_texts(): array {
            $segments = DBIOParent::read_all_rows(
                "adp",
                "segment_formatting",
                new InterfaceADPSegmentFormatting()
            );
            $texts = [];
            $old_id = null;
            $text = "";
            foreach($segments as $key=>$value) {
                if (!in_array($value->file_id, $this->files)) {
                    continue;
                } 
                if (is_null($value->text)) {
                    continue;
                }
                if ($value->file_id == $old_id or is_null($old_id)) {
                    $text .= "$value->text ";
                    $old_id = $value->file_id;
                    continue;
                }
                $texts[$old_id] = substr($text, 0, -1);
                $text = $value->text;
                $old_id = $value->file_id;
            }
            $texts[$old_id] = substr($text, 0, -1);
            $text = "";
            $old_id = $value->file_id;
            return $texts;
        }

    }

?>