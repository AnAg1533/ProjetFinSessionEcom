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

        public function GetProducts()
        {
            $conn = $this->Connect();
            $sql = $conn -> query("SELECT * FROM products");

            if($sql)
            {
                return $sql;
            }
            else
            {
                return null;
            }
        }

        public function GetProduct($id)
        {
            $conn = $this->Connect();
            $sql = $conn -> prepare("SELECT * FROM products WHERE id=?");
            $sql -> execute(array($id));
           
            if($sql)
            {
                return $sql;
            }
            else
            {
                return null;
            }
        }
    }

?>