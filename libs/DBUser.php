<?php

require_once("db.php");

class DBUser {
    public static function isUserRegistered(string $email): bool {
        try {
            $connection = (new Db())->getConnection();

            $sql = "SELECT * FROM USERS WHERE email=:email";

            $selectStatement = $connection->prepare($sql);

            $selectStatement->execute(['email' => $email]);

            if ($selectStatement->rowCount() == 1) {
              return true;
            }

            return false;
        }
        catch (PDOException $e) {
            var_dump($e->getMessage());
            error_log($e->getMessage());
            return false;
        }
    }

    public static function addUser(array $userData): void {
        try {
            $connection = (new Db())->getConnection();
            $sql = "INSERT INTO USERS (first_name, last_name, email, password, faculty_number)
                    VALUES (:firstName, :lastName, :email, :password, :facultyNumber)";
            $insertStatement = $connection->prepare($sql);

            $insertStatement->execute(["firstName" => $userData["firstName"],
                                       "lastName" => $userData["lastName"],
                                       "email" => $userData["email"],
                                       "password" => $userData["password"],
                                       "facultyNumber" => $userData["facultyNumber"]]);

            // $sql = "SELECT * FROM USERS WHERE username=:username";
            // $selectStatement = $connection->prepare($sql);
            //
            // $selectStatement->execute(['email' => $userData['email']);
            // $user = $selectStatement->fetch();
        } catch(PDOException $e) {
            error_log($e->getMessage());
        }
    }

}

?>
