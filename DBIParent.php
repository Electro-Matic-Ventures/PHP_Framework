<?php

class DBIParent
{
    public function null_constructor()
    {
        foreach (get_object_vars($this) as $property => $value) {
            $this->$property = null;
        }
    }

    public function data_constructor(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
