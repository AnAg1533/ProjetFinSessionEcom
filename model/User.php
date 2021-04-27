<?php 

    class User
    {
        protected $nom;
        protected $prenom;
        protected $username;
        protected $password;
        protected $email;
        protected $connection;


        public function __construct($Nom,$Prenom,$UserName,$Password,$Email,$Connection)
        {
                        $this->nom = $Nom;
                        $this->prenom = $Prenom;
                        $this->username = $UserName;
                        $this->password = $Password;
                        $this->connetion = $Connection;
                        $this->email = $Email;
        }


        public function Register()
        {
                $conn = $this->connection;
                $sql = $conn -> prepare('INSERT INTO Membre(nom,prenom,username,password,email) VALUES(?,?,?,?,?)');
                $sql -> execute(array($this->nom,$this->prenom,$this->username,$this->password,$this->email));
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
            $conn = $this->connection;
            $sql = $conn -> prepare('SELECT * FROM Membre WHERE username=? AND password=?');
            $sql -> execute($this->username,$this->password);

            if($sql)
            {
                while($data = $sql->fetch())
                {   
                    session_start();
                    $_SESSION['username']=$data['username'];
                    $_SESSION['password']=$data['password'];
                    header('location:index.php?action=Membre');
                } 
            }
        }

    }


    

?>