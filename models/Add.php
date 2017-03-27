<?php

class Add extends Tester
{
    private $data;
    private $tablename;
    
    function __construct($data,$table_name) 
    {
        if(is_array($data))
        {
            $this->data = $data;
            $this->tablename=$table_name;
            //echo $this->tablename;
        }   
        else 
        {
            throw new Exception("Data must be in array :( ");
        }
        //connect to database
        $this->connectToDb();
        //isert data to database
        $this->addData();
        //close database connection
        $this->close();
    }
    //isert data to database
    private function addData ()
    {
        foreach ($this->data as $key=>$value)
        {
            $keys[]   = $key;
            $values[] = $value;
         
        }
            $cols = implode($keys, ",");
            $dataValues = "'".implode($values, "','")."'";
            $query = "INSERT INTO `$this->tablename`($cols)VALUES($dataValues);";
           
            $conn = $this->DB->conn;
            
            $sql = $conn->query($query);
            
            if($sql == TRUE)    return TRUE;
            else                
            {
                
                throw new Exception("Error : Data Not inserted to database :( ".$conn->error);
                
            }
        
    }       
    
    
}