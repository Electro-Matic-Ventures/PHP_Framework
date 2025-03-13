<?php

require_once 'Table.php';
require_once 'TableTR.php';
require_once 'TableTD.php';
require_once 'Input.php';
require_once 'DBIContact.php';

class PageContactsTable
{
    public static function table(array $contacts): string
    {
        $html = "<form method='post' action=''>\n";

        $table = new Table();

        $table->attributes->border = '1';
        $table->attributes->cellpadding = '5';
        $table->attributes->cellspacing = '0';

        $headerTr = new TableTR();

        $tdHash = new TableTD();
        $tdHash->contained = "#";
        $headerTr->contained .= $tdHash->draw();

        $tdName = new TableTD();
        $tdName->contained = "NAME";
        $headerTr->contained .= $tdName->draw();

        $tdPhone = new TableTD();
        $tdPhone->contained = "PHONE NUMBER";
        $headerTr->contained .= $tdPhone->draw();

        $tdEmail = new TableTD();
        $tdEmail->contained = "EMAIL";
        $headerTr->contained .= $tdEmail->draw();

        $tdAction = new TableTD();
        $tdAction->contained = "";
        $headerTr->contained .= $tdAction->draw();

        $table->contained .= $headerTr->draw();

        $newTr = new TableTR();

        $tdNewLabel = new TableTD();
        $tdNewLabel->contained = "NEW";
        $newTr->contained .= $tdNewLabel->draw();

        $newNameInput = new Input();
        $newNameInput->attributes->type = 'text';
        $newNameInput->attributes->name = 'name_new';

        $tdNewName = new TableTD();
        $tdNewName->contained = $newNameInput->draw();
        $newTr->contained .= $tdNewName->draw();

        $newPhoneInput = new Input();
        $newPhoneInput->attributes->type = 'text';
        $newPhoneInput->attributes->name = 'phone_number_new';

        $tdNewPhone = new TableTD();
        $tdNewPhone->contained = $newPhoneInput->draw();
        $newTr->contained .= $tdNewPhone->draw();

        $newEmailInput = new Input();
        $newEmailInput->attributes->type = 'text';
        $newEmailInput->attributes->name = 'email_new';

        $tdNewEmail = new TableTD();
        $tdNewEmail->contained = $newEmailInput->draw();
        $newTr->contained .= $tdNewEmail->draw();

        $tdAddButton = new TableTD();
        $tdAddButton->contained = "<button type='submit' name='action' value='create'>ADD</button>";
        $newTr->contained .= $tdAddButton->draw();

        $table->contained .= $newTr->draw();

        foreach ($contacts as $contact) {
            $tr = new TableTR();

            $tdId = new TableTD();
            $tdId->contained = (string) $contact->id;
            $tr->contained .= $tdId->draw();

            $tdName = new TableTD();
            $nameInput = new Input();
            $nameInput->attributes->type  = 'text';

            $nameInput->attributes->name  = 'name_' . $contact->id;
            $nameInput->attributes->value = $contact->name;
            $tdName->contained = $nameInput->draw();
            $tr->contained .= $tdName->draw();

            $tdPhone = new TableTD();
            $phoneInput = new Input();
            $phoneInput->attributes->type  = 'text';
            $phoneInput->attributes->name  = 'phone_number_' . $contact->id;
            $phoneInput->attributes->value = $contact->phone_number;
            $tdPhone->contained = $phoneInput->draw();
            $tr->contained .= $tdPhone->draw();

            $tdEmail = new TableTD();
            $emailInput = new Input();
            $emailInput->attributes->type  = 'text';
            $emailInput->attributes->name  = 'email_' . $contact->id;
            $emailInput->attributes->value = $contact->email;
            $tdEmail->contained = $emailInput->draw();
            $tr->contained .= $tdEmail->draw();

            $tdAction = new TableTD();

            $removeButton = "<button type='submit' name='action' value='destroy_{$contact->id}'>REMOVE</button>";

            $updateButton = "<button type='submit' name='action' value='update_{$contact->id}'>UPDATE</button>";

            $tdAction->contained = $removeButton . " " . $updateButton;
            $tr->contained .= $tdAction->draw();

            $table->contained .= $tr->draw();
        }

        $html .= $table->draw();
        $html .= "\n</form>";

        return $html;
    }
}
