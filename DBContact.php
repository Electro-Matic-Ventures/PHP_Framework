<?php
    require_once 'DBConnection.php';

    /**
     * DBContact
     * @property int $id
     * @property string $name
     * @property int $phone_number
     * @property string $email
     * @method loadById
     * @method save
     * @method delete
     * @method getAllContacts   
    */

    class DBContact
    {
        public $id;
        public $name;
        public $phone_number;
        public $email;


        /**
         * Method is used to load a new contact.
         * If ID argument is given, it will call 
         * loadById to load the information of the 
         * contact who's ID matches with the given 
         * ID. If none is given, then it will default 
         * to making a new contact.
         */
        public function __construct($id = null)
        {
            if ($id) {
                $this->loadById($id);
            }
        }


        /**
         * Method loads contact into DBContact object
         * according to the given ID.
         */
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

        /**
         * Method saves current DBContact object into
         * database as a contact.
         */
        public function save()
        {
            $conn = new DBConnection();
            if ($this->id) {
                $stmt = $conn->mysqli->prepare("UPDATE contacts SET name=?, phone_number=?, email=? WHERE id=?");
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
        

        /**
         * Method deletes contact from database
         * according to given ID.
         */
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

        /**
         * Method gets all contacts currently 
         * in the database.
         */
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