<?php


    require_once("InterfaceSettingsIPSelf.php");
    require_once("SignParameterTable.php");
    require_once("Form.php");
    require_once("Input.php");
    require_once("Paragraph.php");


    class StagedSignParameterTable {

        public static function draw(InterfaceSettingsIPSelf $ip) {
            $div = new ContentDivision();
            $div->attributes->core->id = "staged_parameters_feedback_area";
            $p = new Paragraph();
            $p->attributes->core->id = "staged_parameters_message";
            $p->text = "Staged IP Parameters";
            $div->contained = $p->draw();
            $div->contained .= SignParameterTable::draw($ip);
            $div->contained .= self::reboot_button();
            return $div->draw();
        }    

        private static function reboot_button():string {
            $form = new Form();
            $reboot_flag_input = new Input();
            $reboot_flag_input->attributes->type = "number";
            $reboot_flag_input->attributes->name = "reboot_flag";
            $reboot_flag_input->attributes->value = "1";
            $reboot_flag_input->attributes->core->hidden = true;
            $reboot_button_description = new Paragraph();
            $reboot_button_description->attributes->core->id = "reboot_button_description";
            $reboot_button_description->text = "Click to reboot to apply staged changes.";
            $reboot_button = new Input();
            $reboot_button->attributes->type = "submit";
            $reboot_button->attributes->core->id = "change_ip_reboot_button";
            $reboot_button->attributes->value = "REBOOT";
            $form->contained = $reboot_flag_input->draw();
            $form->contained .= $reboot_button_description->draw();
            $form->contained .= $reboot_button->draw();
            return $form->draw();
        }

    }


?>