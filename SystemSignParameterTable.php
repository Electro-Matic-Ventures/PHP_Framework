<?php


    require_once("ContentDivision.php");
    require_once("Paragraph.php");
    require_once("InterfaceSettingsIPSelf.php");
    

    class SystemSignParameterTable {


        public static function draw(
            bool $reboot_flag,
            InterfaceSettingsIPSelf $new_ip,
            InterfaceSettingsIPSelf $current_ip
            ): string {
                $div = new ContentDivision();
                $div->attributes->core->id = "system_ip_parameter_table_area";
                $p = new Paragraph();
                $p->attributes->core->id = "system_ip_parameter_table_message";
                $p->text = "System IP Parameters";
                $div->contained = $p->draw();
                if ($reboot_flag) {
                    $div->contained .= SignParameterTable::draw($new_ip);
                } else {
                    $div->contained .= SignParameterTable::draw($current_ip);
                }
                $div->contained .= self::reboot_indicator($reboot_flag);
                return $div->draw();
        }

        private static function reboot_indicator(bool $reboot_flag): string {
            $div = new ContentDivision();
            $div->attributes->core->id = "reboot_indicator";
            $div->attributes->core->hidden = !$reboot_flag;
            $p = new Paragraph();
            $p->text = "REBOOTING...";
            $div->contained = $p->draw();
            return $div->draw();
        }
    
    }
    

?>