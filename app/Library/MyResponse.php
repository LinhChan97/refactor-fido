<?php

namespace App\Library;

class MyResponse
{
    public $status;
    public $message;
    public $object;

    public function __construct($s, $m, $object = null)
    {
        $this->status = $s;
        $this->message = $m;
        $this->object = $object;
    }

}
