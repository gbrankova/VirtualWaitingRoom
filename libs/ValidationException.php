<?php

class ValidationException extends Exception {

    private array $errors;

    public function __construct(array $errors, $message = "Invalid request") {
        parent::__construct($message);
        $this->errors = $errors;
    }

    public function getErrors(): array {
        return $this->errors;
    }
}

?>
