<?php

class User {

    private string $email;
    private string $firstName;
    private string $lastName;
    private string $password;
    private string $facultyNumber;
    private bool $isStudent;

    public function __construct(string $_email,
                                string $_firstName,
                                string $_lastName,
                                string $_password,
                                string $_facultyNumber,
                                bool $_isStudent) {
        $this->email = $_email;
        $this->firstName = $_firstName;
        $this->lastName = $_lastName;
        $this->password = $_password;
        $this->facultyNumber = $_facultyNumber;
        $this->isStudent = $_isStudent;
    }

    private function hashPassword(): string {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function toArray(): array {
        return [
            "email" => $this->email,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "password" => $this->hashPassword(),
            "facultyNumber" => $this->facultyNumber
        ];
    }
}
