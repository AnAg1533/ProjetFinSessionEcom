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
                $sql = $conn -> prepare('INSERT INTO membre(nom,prenom,username,password) VALUES(?,?,?,?)');
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
            $conn = $this->connection;
            $sql = $conn -> prepare('SELECT * FROM membre WHERE username=? AND password=?');
            $sql -> execute($this->username,$this->password);

            if($sql)
            {
                while($data = $sql->fetch())
                {   
                    session_start();
                    $_SESSION['username']=$data['username'];
                    $_SESSION['password']=$data['password'];
                    header('location:index.php?action=membre');
                } 
            }
        }

    }


    

?>