<?php

require_once 'DBContact.php';
require_once 'Table.php';
require_once 'TableTR.php';
require_once 'TableTD.php';
require_once 'Input.php';

class PageContactsTable
{
    public function render(): string
    {
        ob_start();
        echo "<h1>Contacts List</h1>";
        
        $this->handleRequest();

        $this->renderContactsTable();

        $this->renderCreateForm();

        $html = ob_get_clean();
        return $html;
    }

    private function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $action = $_POST['action'] ?? '';
            
            if ($action === 'create') {
                $contact = new DBContact();
                $contact->name = $_POST['name'];
                $contact->phone_number = $_POST['phone_number'];
                $contact->email = $_POST['email'];
                $contact->save();
            } elseif ($action === 'update') {
                $contact = new DBContact($_POST['id']);
                $contact->name = $_POST['name'];
                $contact->phone_number = $_POST['phone_number'];
                $contact->email = $_POST['email'];
                $contact->save();
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $contact = new DBContact($_GET['id']);
            $contact->delete();
        }
    }

    private function renderContactsTable()
    {
        $contacts = DBContact::getAllContacts();

        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Actions</th></tr>";

        foreach ($contacts as $contact) {
            $tr = new TableTR();

            $tdId = new TableTD();
            $tdId->contained = $contact->id;
            $tr->contained .= $tdId->draw();

            $tdName = new TableTD();
            $tdName->contained = $contact->name;
            $tr->contained .= $tdName->draw();

            $tdPhone = new TableTD();
            $tdPhone->contained = $contact->phone_number;
            $tr->contained .= $tdPhone->draw();

            $tdEmail = new TableTD();
            $tdEmail->contained = $contact->email;
            $tr->contained .= $tdEmail->draw();

            $tdActions = new TableTD();
            $tdActions->contained = "<a href='?action=update&id={$contact->id}'>Edit</a> | "
                . "<a href='?action=delete&id={$contact->id}' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
            $tr->contained .= $tdActions->draw();

            echo $tr->draw();
        }

        echo "</table>";
    }

    private function renderCreateForm()
    {
        echo "<h2>Add New Contact</h2>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='action' value='create'>";

        echo "<label>Name:</label>";
        $nameInput = new Input();
        $nameInput->attributes->name = "name";
        echo $nameInput->draw();
        echo "<br>";

        echo "<label>Phone:</label>";
        $phoneInput = new Input();
        $phoneInput->attributes->name = "phone_number";
        echo $phoneInput->draw();
        echo "<br>";

        echo "<label>Email:</label>";
        $emailInput = new Input();
        $emailInput->attributes->name = "email";
        echo $emailInput->draw();
        echo "<br>";

        echo "<input type='submit' value='Add Contact'>";
        echo "</form>";
    }
}
