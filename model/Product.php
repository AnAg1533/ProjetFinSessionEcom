<?php


    class Product
    {
        protected $titre;
        protected $prix;
        protected $enStock;
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
                        $this->photo = $Image;
        }

        public function Add()
        {   
            $Manager = new DbManager('localhost','test','username','password');
            $conn = $Manager->Connect();    
                $target = "uploads/".basename($_FILES['photo']['name']);

                if(move_uploaded_file($_FILES['photo']['tmp_name'],$target))
                {   
                    echo "Moved as fuck";
                    $sql = $conn -> prepare('INSERT INTO products(titre,prix,photo,color,enstock) VALUES(?,?,?,?,?)');
                    $sql -> execute(array($this->titre,$this->prix,$this->photo,$this->couleur,$this->enStock));
                    if($sql)
                    {    
                        echo "<script>alert('PRODUCT ADDED YOU WILL BE REDIRECTED NOW');</script>";
                        header('location:index.php');
                        
                    }
                    else
                    {
                        echo "Query Failure";
                    }
                }
                else
                {
                    echo"Upload Failure try fucking again later";
                }
        }     
        
        public function GetAll()
        {
            $Manager = new DbManager('localhost','test','username','password');
            $conn = $Manager->Connect();   
            $sql = $conn -> query('SELECT * FROM products');
            if($sql)
            {
                echo "Data found";

                while($data=$sql->fetch())
                {   
                ?>
                    <tr>
                        <td><?=$data['titre'];?></td>
                        <td><?=$data['color'];?></td>
                        <td><?=$data['enStock'];?></td>
                        <td><?=$data['prix'];?></td>
                        <td><img src='uploads/<?=$data['photo'];?>'/></td>
                    </tr>

                    <?php 
                    
                }

            }
            else
            {
                echo "data not found";
            }
        }


        public function GetAllS()
        {
            $Manager = new DbManager('localhost','test','username','password');
            $conn = $Manager->Connect();   
            $sql = $conn -> query('SELECT * FROM products');
            if($sql)
            {
               return $sql;

            }
            else
            {
                echo "data not found";
            }
        }
                
    }


    

?>