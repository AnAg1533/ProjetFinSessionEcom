<?php

    require_once 'model/DbManager.php';
    require_once 'model/Product.php';
    require_once 'model/User.php';
    
    //$Manager = new DbManager('localhost','test','username','password');
    $Manager = new DbManager('localhost','test','root','');
     
    $conn = $Manager->Connect();

    if($conn==null)
    {
        echo "Connection failure";    
    }
    

    function Home()
    {
        ob_start();
        require_once 'view/homeView.php';
        $content  = ob_get_clean();
        echo $content;
    }

    function RegisterPage()
    {
        ob_start();
        require_once 'view/registerView.php';
        $content  = ob_get_clean();
        echo $content;
    }

    function RegisterUser() //it works you can register a user!
    {   
        //$Manager = new DbManager('localhost','test','username','password');
        $Manager = new DbManager('localhost','test','root','');
     
        $conn = $Manager->Connect();
    
        ob_start();

        $user = new User($_POST['nom'],$_POST['prenom'],$_POST['username'],$_POST['password'],$conn);
        
        $user->Register();

        
    }

    function LoginUser()
    {   
        if(isset($_POST['username']) && isset($_POST['password']))
        {  
            $user = new User('','',$_POST['username'],$_POST['password']);
            $user->Login();
        }
        
        

        $user->Login();
    }
    function Store()
    {   
        session_start();
        if(isset($_SESSION['username']))
        {
            //header('location:index.php');
        }

        $u = new Product('','','','','','');
        $sql = $u -> GetAllS();
        ob_start();
        require_once 'view/productsView.php';
        $content  = ob_get_clean();
        echo $content;

        
    }
    function LearnMore()
    {
        ob_start();
        $u = new Product('','','','','','');
        $sql = $u -> GetOne($_GET['id']);
        require_once 'view/learnMoreView.php';
        $content  = ob_get_clean();
        echo $content;
    }

    function Admin()
    {
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
        {
            ob_start();
            $Product = new Product('','','','','','');
            $User = new User('','','','');
            require_once 'view/adminView.php';
            $content  = ob_get_clean();
            echo $content;
            
        }

    }

    function AddProduct()
    {   
        //$Manager = new DbManager('localhost','test','username','password');
        $Manager = new DbManager('localhost','test','root','');
        $conn = $Manager->Connect();
        $Produit = new Product($_POST['titre'],$_POST['prix'],$_POST['enstock'],$_FILES['photo']['name'],$_POST['couleur'],$conn);
        $Produit->Add();
        echo "Product added";
    }
    function DelUser()
    {
        $u = new User('','','','');
        $u->Delete($_GET['id']);
        header('location:index.php');
    }
?>