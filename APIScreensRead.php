<?php


    require_once("DBIOParent.php");
    require_once("InterfaceADPPlaylist.php");
    require_once("InterfaceADPScreenFormatting.php");
    require_once("InterfaceADPRowFormatting.php");
    require_once("InterfaceADPSegmentFormatting.php");
    require_once("APIScreensReadProcessData.php");


    class APIScreensRead {

        public static function go() {
            $queries = [
                "SELECT * FROM adp.playlist",
                "SELECT * FROM adp.screen_formatting",
                "SELECT * FROM adp.row_formatting",
                "SELECT * FROM adp.segment_formatting"
            ];
            $queries = implode(";",$queries);
            $response = DBIOParent::multi_query($queries);
            $data["playlist"] = DBIOParent::pack($response[0], new InterfaceADPPlaylist());
            $data["screens"] = DBIOParent::pack($response[1], new InterfaceADPScreenFormatting());
            $data["rows"] = DBIOParent::pack($response[2], new InterfaceADPRowFormatting());
            $data["segments"] = DBIOParent::pack($response[3], new InterfaceADPSegmentFormatting());
            $processed = APIScreensReadProcessData::go($data);
            return $processed;
        }

    }


?>