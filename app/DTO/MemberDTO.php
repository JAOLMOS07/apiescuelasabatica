<?php

namespace App\DTO;

class MemberDTO
{
    public $id;
    public $name;
    public $lastName;
    public $email;
    public $phone;
    public $birthMonth;
    public $birthDay;
    public $status;
    public $class_id;
    public $address;
    public $registerTypes;

    public function __construct($id, $name, $lastName, $email, $phone, $birthMonth, $birthDay, $status, $class_id, $address, $registerTypes = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->birthMonth = $birthMonth;
        $this->birthDay = $birthDay;
        $this->status = $status;
        $this->class_id = $class_id;
        $this->address = $address;
        $this->registerTypes = $registerTypes;
    }
}
