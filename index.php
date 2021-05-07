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
            else if($_GET['action']=='SHOP' && isset($_GET['id']))
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
                LoginUser();
            }
            else if($_GET['action']=='delUser' && isset($_GET['action']))
            {
                DelUser();
            }
            else if($_GET['action']=='delProd' && isset($_GET['action']))
            {
                Del();
            }
           

        }
        else
        {
            Home();
        }




?>