<?php


    class Product
    {
        protected $titre;
        protected $prix;
        protected $enStock;
        protected $image;
        protected $coleur;
        protected $connection;
        protected $photo;


        public function __construct($Titre,$Prix,$EnStock,$Image,$Couleur,$Connection)
        {
                        $this->titre = $Titre;
                        $this->prix = $Prix;
                        $this->enStock = $EnStock;
                        $this->couleur = $Couleur;
                        $this->connetion = $Connection;
                        $this->Image = $Image;
        }

        public function AddProduct()
        {
                $conn = $this->connection;
                if(isset($_POST['upload']))
                {
                    $target = "uploads/".basename($_POST['upload']['name']);
                    $sql = $conn -> prepare('INSERT INTO Products(titre,prix,image,couleur,enstock,photo) VALUES(?,?,?,?,?,?)');
                    $sql -> execute(array($this->titre,$this->prix,$this->image,$this->couleur,$this->enStock,$this->photo));
                if($sql)
                {    
                     echo "<script>alert('REGISTER SUCCESFUL YOU WILL BE REDIRECTED NOW');</script>";
                     header('location:index.php');
                }
                else
                {
                    echo "Query Failure";
                }

                    if(move_uploaded_file($_FILES['ProfileUpload2']['tmp_name'],$target))
                    {   
                       
                        echo "Moved as fuck";
                        header("Location:./Member.php");
                        $sql -> execute(array($_SESSION['UserId'],$_FILES['ProfileUpload2']['name']));
                    }
                    else
                    {
                        echo"Upload Failure try fucking again later";
                        header("Location:./Member.php?Upload=ldsjfsmakjshdfa");
                    }
                }
                    

                                        
                
        }


    }

?>