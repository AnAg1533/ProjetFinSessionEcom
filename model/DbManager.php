<?php 

    class DbManager 
    {
        protected $server;
        protected $database;
        protected $username;
        protected $password;


        public function __construct($Server,$Database,$Username,$Password)
        {
            $this -> server = $Server;
            $this -> database = $Database;
            $this -> username = $Username;
            $this -> password = $Password;
        }

        public function Connect()
        {
            try
            {
                $conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
                $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn;
            }
            catch(PDOException $e)
            {
                echo "Connection failure with error code : " + $e;
                return $e;
            }
        }
    }

?>