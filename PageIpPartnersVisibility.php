<?php


    class PageIpPartnersVisibility {

        public static function go($data) {
            if (is_null($data)) {
                return null;
            }
            $V["INPUT"]["STAGED"]["TYPE"] = "";
            $V["INPUT"]["STAGED"]["IP"] = $data["INPUT"]["STAGED"]->type == "none" ? "hidden" : "";
            $V["INPUT"]["STAGED"]["RACK"] = $data["INPUT"]["STAGED"]->type == "none" ? "hidden" : "";
            $V["INPUT"]["STAGED"]["SLOT"] = $data["INPUT"]["STAGED"]->type == "siemens" ? "" : "hidden";
            $V["INPUT"]["STAGED"]["PORT"] = "hidden";
            $V["INPUT"]["SYSTEM"]["TYPE"] = "";
            $V["INPUT"]["SYSTEM"]["IP"] = $data["INPUT"]["SAVED"]->type == "none" ? "hidden" : "";
            $V["INPUT"]["SYSTEM"]["RACK"] = $data["INPUT"]["SAVED"]->type == "none" ? "hidden" : "";
            $V["INPUT"]["SYSTEM"]["SLOT"] = $data["INPUT"]["SAVED"]->type == "siemens" ? "" : "hidden";
            $V["INPUT"]["SYSTEM"]["PORT"] = "hidden";
            $V["OUTPUT"]["SAVED"]["TYPE"] = "";
            $V["OUTPUT"]["SAVED"]["IP"] = $data["OUTPUT"]["SAVED"]->type == "none" ? "hidden" : "";
            $V["OUTPUT"]["SAVED"]["PORT"] = $data["OUTPUT"]["SAVED"]->type == "none" ? "hidden" : "";
            return $V;
        }

    }

?>