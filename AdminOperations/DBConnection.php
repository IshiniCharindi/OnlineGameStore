<?php

class DBConnection
{
    private $hostName = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'gamesstore';
    private $port = 3308;

    public function DatabaseConnection()
    {
        $con = new mysqli($this->hostName, $this->username, $this->password, $this->database, $this->port);

        if ($con->connect_error) {
            die("<h1>Database Connection Failed: " . $con->connect_error . "</h1>");
        }

        return $con;
    }
}
?>