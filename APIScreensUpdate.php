<?php


    require_once("DBIOParent.php");
    require_once("APIScreensUpdateBuildPlaylistQuery.php");
    require_once("APIScreensUpdateBuildScreensQuery.php");

    class APIScreensUpdate {

        public static function go($data) {
            [$query, $playlist] = APIScreensUpdateBuildScreensQuery::go($data);
            $query .= APIScreensUpdateBuildPlaylistQuery::go($playlist);
            $response = DBIOParent::multi_query($query);
            return;
        }
    }

    
?>