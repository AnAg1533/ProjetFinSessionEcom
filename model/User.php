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
                //$Manager = new DbManager('localhost','test','root','');
                $Manager = new DbManager('localhost','test','username','password');
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


        public function GetAll()
        {   
            //$Manager = new DbManager('localhost','test','root','');
            $Manager = new DbManager('localhost','test','username','password');
            $conn = $Manager->Connect();
            $sql = $conn -> query('SELECT * FROM users');
            //$sql -> execute(array($this->nom,$this->prenom,$this->username,$this->password));
            if($sql)
            {    
                 echo "<script>alert('REGISTER SUCCESFUL YOU WILL BE REDIRECTED NOW');</script>";
                    while($data=$sql->fetch())
                    {
                 ?>
            <tr>
                 <td><?=  $data['nom']?> </td>
                 <td><?=  $data['prenom']?> </td>
                 <td><?=  $data['username']?> </td>
                 <td><?=  $data['pass']?> </td>
                 <td><a href='index.php?action=delUser&id=<?= $data['id']?>'>DELETE</a></td>
            </tr>
                    
                 <?php
                    } 
                 
            }
            else
            {
                echo "Query Failure";
            }
        }

        public function Delete($id)
        {
            $Manager = new DbManager('localhost','test','username','password');
            //$Manager = new DbManager('localhost','test','root','');
     
            $conn = $Manager->Connect();
            
            //$conn = $this->connection;
            $sql = $conn -> prepare('DELETE FROM users WHERE id=?');
            $sql -> execute(array($_GET['id']));

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
                   session_start();
                   $_SESSION['username'] = $data['username'];
               }
               header('location:index.php?action=loggedIn');
            }
            else
            {
                echo "<h1>Kiss my ass</h1>";
            }
        }

    }


    

?>