<?php
namespace App\Data\User;

class Profile
{
    public string $id;
    public string $email;
    public string $name;

    public function __construct(string $id, string $email, string $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }
}