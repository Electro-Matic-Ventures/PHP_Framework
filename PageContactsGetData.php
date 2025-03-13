<?php

require_once 'DBConnection.php';
require_once 'DBIContact.php'; 

class PageContactsGetData
{

    public static function get(): array
    {
        $db = new DBConnection();
        $mysqli = $db->mysqli;

        $sql = "SELECT * FROM contacts";
        $result = $mysqli->query($sql);

        $contacts = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $contact = new DBIContact($row);
                $contacts[] = $contact;
            }
            $result->free();
        } else {
            // throw new Exception("Database query failed: " . $mysqli->error);
        }

        return $contacts;
    }
}
