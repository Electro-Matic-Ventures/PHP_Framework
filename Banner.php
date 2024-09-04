<?php


    require_once("ContentDivision.php");
    require_once("ContentDivisionAttributes.php");
    require_once("Image.php");
    require_once("ImageAttributes.php");
    require_once("Paragraph.php");
    require_once("ParagraphAttributes.php");
    require_once("Superscript.php");
    require_once("SuperscriptAttributes.php");


    class Banner {

        public static function go(){
            $banner = Banner::shingle();
            $banner .= Banner::phone_host();
            return $banner;
        }

        private static function shingle() {
            $logo = Banner::logo();
            $shingle_text = Banner::shingle_text();
            $shingle = new ContentDivision();
            $shingle->attributes->core->id = "shingle";
            $shingle->contained = $logo.$shingle_text;
            return $shingle->draw();
        }

        private static function logo() {
            $image = Banner::logo_image();
            $logo = new ContentDivision();
            $logo->attributes->core->id = "logo";
            $logo->contained = $image;
            return $logo->draw();
        }

        private static function logo_image() {
            $image = new Image();
            $image->attributes->src = "../../assets/logo.png";
            return $image->draw();
        }

        private static function shingle_text() {
            $company_name = Banner::company_name();
            $slogan_host = Banner::slogan_host();
            $shingle_text = new ContentDivision();
            $shingle_text->attributes->core->id = "shingle_text";
            $shingle_text->contained = $company_name.$slogan_host;
            return $shingle_text->draw();
        }

        private static function company_name() {
            $image = Banner::company_name_image();
            $company_name = new ContentDivision();
            $company_name->attributes->core->id = "company_name";
            $company_name->contained = $image;
            return $company_name->draw();
        }

        private static function company_name_image() {
            $image = new Image();
            $image->attributes->src = "../../assets/company_name.png";
            return $image->draw();
        }

        private static function slogan_host() {
            $slogan_text = Banner::slogan_text();
            $slogan_host = new ContentDivision();
            $slogan_host->attributes->core->id = "slogan_host";
            $slogan_host->contained = $slogan_text;
            return $slogan_host->draw();
        }

        private static function slogan_text() {
            $trade_mark = Banner::trade_mark();
            $slogan_text = new Paragraph();
            $slogan_text->attributes->core->id = "slogan_text";
            $slogan_text->text = "Turning Innovation Into Value {$trade_mark}";
            return $slogan_text->draw();
        }

        private static function trade_mark() {
            $trade_mark = new Superscript();
            $trade_mark->attributes->core->id = "trade_mark";
            $trade_mark->text = "TM";
            return $trade_mark->draw();
        }

        private static function phone_host() {
            $phone_message = Banner::phone_message();
            $phone_number = Banner::phone_number();
            $phone_host = new ContentDivision();
            $phone_host->attributes->core->id = "phone_host";
            $phone_host->contained = $phone_message.$phone_number;
            return $phone_host->draw();
        }

        private static function phone_message() {
            $phone_message = new Paragraph();
            $phone_message->attributes->core->id = "phone_message";
            $phone_message->text = "For Tech Support Call <br>";
            return $phone_message->draw();
        }

        private static function phone_number() {
            $phone_number = new Paragraph();
            $phone_number->attributes->core->id = "phone_number";
            $phone_number->text = "248-478-1182";
            return $phone_number->draw();
        }

    }


?>