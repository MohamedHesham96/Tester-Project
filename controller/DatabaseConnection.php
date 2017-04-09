<?php

class Database {

    //attributesS
    private $host;
    private $username;
    private $password;
    private $data_base;
    public $conn;

    //methods

    public static function connect() {
        //connect to the server
        $host = $conn = new mysqli($this->host, $this->username, $this->password, $this->data_base);

        if ($conn->connect_error)
            throw new Exception('connection failed :' . $conn->connect_error);

        $this->conn = $conn;

    }

    public function close() {
        mysqli_close($this->conn);
    }

}
