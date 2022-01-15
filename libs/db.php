<?php
    class DB {

        private $connection;

        function __construct() {
            $host = "localhost";
            $dbname = "virtual_waiting_room_app";
            $username = "root";
            $password = "";

            // TODO PDO::ATTR_DEFAULT_FETCH_MODE
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
              [
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
              ]);
        }


        function getConnection(): PDO {
            return $this->connection;
        }

    }
?>
