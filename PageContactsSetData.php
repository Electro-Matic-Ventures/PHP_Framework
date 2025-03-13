<?php

require_once 'DBConnection.php';

class PageContactsSetData
{
    private static array $postData;

    public static function go(array $postData): void
    {
        self::$postData = $postData;

        $action = self::$postData['action'] ?? null;

	if (str_contains($action, 'create')){
        	self::createRecord($postData);
	} else if (str_contains($action, 'update')){
        	self::updateRecord($postData);
	} else if (str_contains($action, 'destroy')){
        	self::destroyRecord($postData);
	}
    }

    private static function createRecord(array $postData): void
    {
        $name = $postData['name_new'] ?? '';
	    $phone = $postData['phone_number_new'] ?? '';
        $email = $postData['email_new'] ?? '';

        $dbConnection = new DBConnection();

        $stmt = $dbConnection->mysqli->prepare(
            "INSERT INTO contacts (name, phone_number, email) VALUES (?, ?, ?)"
        );
        if ($stmt) {
            $stmt->bind_param('sss', $name, $phone, $email);
            $stmt->execute();
            $stmt->close();
        }
    }

    private static function updateRecord(array $postData): void
    {

	    $action = $postData['action'] ?? '';
	    $parts = explode('_', $action);
        $id = end($parts) ?? null;


        if (!$id) {
            return;
        }

	    $name = $postData['name_' . $id] ?? '';
	    $phone = $postData['phone_number_' . $id] ?? '';
        $email = $postData['email_' . $id] ?? '';

        $dbConnection = new DBConnection();

        $stmt = $dbConnection->mysqli->prepare(
            "UPDATE contacts SET name = ?, phone_number = ?, email = ? WHERE id = ?"
        );
        if ($stmt) {
            $stmt->bind_param('sssi', $name, $phone, $email, $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    private static function destroyRecord(array $postData): void
    {
	    $action = $postData['action'] ?? '';
	    $parts = explode('_', $action);
        $id = end($parts) ?? null;
        if (!$id) {
            return;
        }

        $dbConnection = new DBConnection();

        $stmt = $dbConnection->mysqli->prepare(
            "DELETE FROM contacts WHERE id = ?"
        );
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}
