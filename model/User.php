<?php 

    class User
    {
        protected $nom;
        protected $prenom;
        protected $username;
        protected $password;
        



        public function __construct($Nom,$Prenom,$UserName,$Password)
        {
                        $this->nom = $Nom;
                        $this->prenom = $Prenom;
                        $this->username = $UserName;
                        $this->password = $Password;
                        

        }


        public function Register()
        {
                $Manager = new DbManager('localhost','test','root','');
                $conn = $Manager->Connect();
                $sql = $conn -> prepare('INSERT INTO users(nom,prenom,username,pass) VALUES(?,?,?,?)');
                $sql -> execute(array($this->nom,$this->prenom,$this->username,$this->password));
                if($sql)
                {    
                     echo "<script>alert('REGISTER SUCCESFUL YOU WILL BE REDIRECTED NOW');</script>";
                     header('location:index.php');
                }
                else
                {
                    echo "Query Failure";
                }
        }


        public function Login()
        {   
            $Manager = new DbManager('localhost','test','username','password');
            //$Manager = new DbManager('localhost','test','root','');
     
            $conn = $Manager->Connect();
            
            //$conn = $this->connection;
            $sql = $conn -> prepare('SELECT * FROM users WHERE username=? AND pass=?');
            $sql -> execute(array($this->username,$this->password));

            if($sql)
            {
               while($data=$sql->fetch())
               {
                   if($_POST['username']== $data['username'] && $_POST['password'] == $data['pass'])
                   {
                       header('location:index.php?action=loggedIn');
                   }
               }
            }
            else
            {
                echo "<h1>Kiss my ass</h1>";
            }
        }

    }


    

?>