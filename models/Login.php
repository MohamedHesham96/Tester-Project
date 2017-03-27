<?php

class Login extends Tester
{

    private $username;
    private $password;
    private $DB;

    public function __construct($username,$password) 
    {
        //set_data
        $this->setData($username, $password);
        //connect to data_base
        $this->connectToDb();
        //get_data
        $this->getData(); 
    }

    private function setData($username, $password) 
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public  function getData() 
    {
        $query = " SELECT * FROM `users` WHERE `user_name` ='$this->username'  AND `password` = '$this->password'";
        $conn = $this->DB->conn;
        $result = $conn->query($query);
        if ($result->num_rows > 0) 
            {
                
                return true;
            }
        else
        {
            //Exception if the username or password is invalide 
            throw new Exception("Username or password is invalid :( ,try again");
        }
        
    }
    public function close()
    {
        //close database connection 
        $this->DB->close();
    }
}


?>