<?php

class UserValidator {

    public static function validateData(array $userData, bool $isStudent): void {
        $errors = [];

        $email = isset($userData['email']) ? $userData['email'] : "";
        $firstName = isset($userData['firstName']) ? $userData['firstName'] : "";
        $lastName = isset($userData['lastName']) ? $userData['lastName'] : "";
        $password = isset($userData['password']) ? $userData['password'] : "";
        $facultyNumber = isset($userData['facultyNumber']) ? $userData['facultyNumber'] : "";

        UserValidator::isEmpty('email', $email, $errors);
        UserValidator::isEmpty('firstName', $firstName,  $errors);
        UserValidator::isEmpty('lastName', $lastName, $errors);
        UserValidator::isEmpty('password', $password, $errors);
        if($isStudent) {
            UserValidator::isEmpty('facultyNumber', $facultyNumber, $errors);
        }

        UserValidator::isPasswordValid($password, $errors);
        UserValidator::isEmailValid($email, $errors);

        if ($errors) {
            throw new ValidationException($errors);
        }
    }

    public static function isEmpty($fieldName, &$field, &$errors): void {
        if (!$field) {
            $errors[$fieldName] = "Полето не може да бъде празно!";
        }
    }

    public static function isPasswordValid($password, &$errors): void {
        $containsSpecial = preg_match('/[!@#$%^&*]/', $password);
        $containsUpperCase = preg_match('/[A-Z]/', $password);
        $containsLowerCase = preg_match('/[a-z]/', $password);
        $containsDigit = preg_match('/[0-9]/', $password);

        if (mb_strlen($password) < 8) {
            $errors["password"] = "Дължината на паролата трябва да е поне 8 символа!";
        } else if (!$containsDigit) {
            $errors["password"] = "Паролата трябва да съдържа поне една цифра!";
        } else if (!$containsUpperCase) {
            $errors["password"] = "Паролата трябва да съдържа поне една главна буква!";
        } else if (!$containsLowerCase) {
            $errors["password"] = "Паролата трябва да съдържа поне една малка буква!";
        } else if (!$containsSpecial) {
            $errors["password"] = "Паролата трябва да съдържа поне един от специалните символи \"!@#$%^&*\"!";
        }
    }

    public static function isEmailValid($email, &$errors): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Въведеният имейл е невалиден!";
        }
    }
}
