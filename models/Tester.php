<?php
class Tester{
    protected $DB;
    //connect to data base
    protected function connectToDb()
    {
        include'models/database.php';
        try {
                 $this->DB = new Database('include/vars.php');
             } catch (Exception $exc) {
                echo $exc->getMessage();
            }

    }
    public function close()
    {
        $this->DB->close();
    }
}