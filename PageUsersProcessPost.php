<?php 


    require_once("PageUsersPostInterface.php");


    class PageUsersProcessPost {

        public static function go(array $post): PageUsersPostInterface {
            $return = new PageUsersPostInterface($post);
            return $return;
        }

    }


?>