<?php 


       require('controller/controller.php');
        if(isset($_GET['action']))
        {
            if($_GET['action']=='register')
            {
                RegisterPage();      
            }
            else if ($_GET['action']=='registerPost')
            {
               RegisterUser();
            }
            else if($_GET['action']=='loggedIn')
            {
                Store();
            }
            else if($_GET['action']=='learnMore')
            {
                LearnMore();
            }
            else if($_GET['action']=='admin')
            {
                Admin();
            }
            else if($_GET['action']=='addProduct')
            {
                AddProduct();
            }
            else if($_GET['action']=='membre')
            {
                $_SESSION['username'] = $user;
                $_SESSION['password'] = $pwd;
                
                LoginUser();
            }
           

        }
        else
        {
            Home();
        }




?>