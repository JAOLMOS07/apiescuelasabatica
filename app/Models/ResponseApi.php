<?php

namespace App\Models;

class ResponseApi
{
    public $message;
    public $data;

    public function __construct($message, $data)
    {
        $this->message = $message;
        $this->data = $data;
    }
}
