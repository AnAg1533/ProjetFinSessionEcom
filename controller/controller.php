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
        session_start();
        $user = $_SESSION['username'];
        $pwd = $_SESSION['password'];
        
        try {
            if($_POST['username'] == $user && $_POST['password'] == $pwd)
            {
                ob_start();
                require_once 'view/productsView.php';
                $content  = ob_get_clean();
                echo $content;
            }
        } catch (Exception $e) {
            throw $e;
        }
       
        //$Manager = new DbManager('localhost','test','username','password');
        // $Manager = new DbManager('localhost','test','root','');
     
        // $conn = $Manager->Connect();

        // $user = new User($_POST['username'],$_POST['password'],$conn);
        

        // $user->Login();
    }
    function Store()
    {
        ob_start();
        require_once 'view/productsView.php';
        $content  = ob_get_clean();
        echo $content;
    }
    function LearnMore()
    {
        ob_start();
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
?>