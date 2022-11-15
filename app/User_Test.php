<?php

namespace App;

class User_Test
{
    public function __construct($name, $email)
    {
        $this->name= $name;
        $this->email = $email;
    }


    public function name($name=null)
    {
        if ($name) {
            $this->name=$name;
        }
        return $this->name;
    }

    public function email($email=null)
    {
        if ($email) {
            $this->email=$email;
        }
        return $this->email;
    }
}
