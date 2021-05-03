<?php 

    class Voitures
    {
        protected $nom;
        protected $modele;
        protected $Anee;

        public function identification()
        {
                echo "Bonjour je suis une mercedes";
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