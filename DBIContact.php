<?php

require_once 'DBIParent.php';

class DBIContact extends DBIParent
{
    public $id;
    public $name;
    public $phone_number;
    public $email;

    public function __construct($data = null)
    {
        if (is_array($data) && $this->isValidData($data)) {
            $this->data_constructor($data);
        } else {
            $this->null_constructor();
        }
    }

    private function isValidData(array $data): bool
    {
        $requiredKeys = ['id', 'name', 'phone_number', 'email'];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $data)) {
                return false;
            }
        }

        return true;
    }
}
