<?php

namespace App\Api;

class ApiMessages
{
    private $message = [];

    /**
     * @param string $message
     */
    public function __construct(string $message, array $data = [])
    {
        $this->message['message'] = $message;
        $this->message['errors'] = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
