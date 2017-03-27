<?php
class Database
	{
		
		//attributes
		private $host;
		private $username;
		private $password;
		private $data_base;
                public  $conn;
		//methods
		
		public function __construct($filename)
		{
			if(is_file($filename))
                        {
                            include $filename;
                        }
                         else 
                         {    
                            throw new Exception('ERROR :( file name ');
                         }
                            
			$this->host      = $host;
			$this->username  = $username;
			$this->password  = $password;
			$this->data_base = $dbname;
			/*echo $this->host;
			echo $this->username;
			echo $this->password;
			echo $this->data_base;
			*/
			$this->connect();
		}
		private function connect()
		{
			//connect to the server
			$conn = new mysqli($this->host, $this->username, $this->password, $this->data_base); 
			
			if($conn->connect_error)
				throw new Exception ('connection failed :'.$conn->connect_error);
                        else
                        { 
                           echo "OK";
                          $this->conn = $conn; 
                        }  
		}
		public function close()
		{
			mysqli_close($this->conn);
		}
              
		
	}