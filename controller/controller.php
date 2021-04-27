<?php

    require_once 'model/DbManager.php';

    $Manager = new DbManager('localhost','test','username','password');
     
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

    function RegisterUser()
    {   
        $Manager = new DbManager('localhost','test','username','password');
     
        $conn = $Manager->Connect();
    
        ob_start();

        $user = new User($_POST['Nom'],$_POST['Prenom'],$_POST['Password'],$_POST['Email'],$_POST['Connection'],$conn);
        
        $user->Register();

        
    }

    function LoginUser()
    {   
        
        $Manager = new DbManager('localhost','test','username','password');
     
        $conn = $Manager->Connect();

        $user = new User($_POST['Nom'],$_POST['Prenom'],$_POST['Password'],$_POST['Email'],$_POST['Connection'],$conn);
        
        $user->Login();
    }

    function LoginAdmin()
    {
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
        {
            header('location:index.php?action=admin');
        }
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


?>