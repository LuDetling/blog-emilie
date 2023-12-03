<?php

class Contact
{

    private $id;
    private  $name;
    private  $email;
    private  $phone;

    public function getId(): ?int
    {
        return $this->id;
    }
    function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    function setId(int $id)
    {
        $this->id = $id;
    }

    function setName(string $name): void
    {
        $this->name = $name;
    }
    function setEmail(string $email): void
    {
        $this->email = $email;
    }
    function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function __toString()
    {
        return "
        Id: " . $this->id . "
        Name: " . $this->name . "
        Email: " . $this->email . "
        Phone number: " . $this->phone . " 
        ";
    }
}
