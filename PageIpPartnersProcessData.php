<?php


    class PageIpPartnersProcessData {

        public static function go($query) {
            parse_str($query, $processed);
            return $processed;
        }
    }

?>