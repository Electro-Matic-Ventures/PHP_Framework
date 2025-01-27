<?php
    require_once 'DBConnection.php';

    class DBContact
    {
        public $id;
        public $name;
        public $phone_number;
        public $email;

        public function __construct($id = null)
        {
            if ($id) {
                $this->loadById($id);
            }
        }

        public function loadById($id)
        {
            $conn = new DBConnection();
            $stmt = $conn->mysqli->prepare("SELECT id, name, phone_number, email FROM contacts WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $this->id = $row['id'];
                $this->name = $row['name'];
                $this->phone_number = $row['phone_number'];
                $this->email = $row['email'];
            }
            $stmt->close();
        }

        public function save()
        {
            $conn = new DBConnection();
            if ($this->id) {
                $stmt = $conn->mysqli->prepare("UPDATE contacts SET name = ?, phone_number = ?, email = ? WHERE id = ?");
                $stmt->bind_param("sssi", $this->name, $this->phone_number, $this->email, $this->id);
            } else {
                $stmt = $conn->mysqli->prepare("INSERT INTO contacts (name, phone_number, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $this->name, $this->phone_number, $this->email);
            }
            $stmt->execute();
            if (!$this->id) {
                $this->id = $stmt->insert_id;
            }
            $stmt->close();
        }

        public function delete()
        {
            $conn = new DBConnection();
            if ($this->id) {
                $stmt = $conn->mysqli->prepare("DELETE FROM contacts WHERE id = ?");
                $stmt->bind_param("i", $this->id);
                $stmt->execute();
                $stmt->close();
            }
        }

        public static function getAllContacts()
        {
            $conn = new DBConnection();
            $result = $conn->mysqli->query("SELECT id, name, phone_number, email FROM contacts");
            $contacts = [];
            while ($row = $result->fetch_assoc()) {
                $contact = new DBContact();
                $contact->id = $row['id'];
                $contact->name = $row['name'];
                $contact->phone_number = $row['phone_number'];
                $contact->email = $row['email'];
                $contacts[] = $contact;
            }
            return $contacts;
        }
    }


?>