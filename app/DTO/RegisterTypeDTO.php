<?php
namespace App\DTO;

class RegisterTypeDTO
{
    public $name;
    public $id;
    public $registerId;
    public $value;

    public function __construct($name, $id, $registerId, $value)
    {
        $this->name = $name;
        $this->id = $id;
        $this->registerId = $registerId;
        $this->value = $value;
    }
}
